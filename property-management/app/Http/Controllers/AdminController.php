<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function showAdminCreateResForm()
    {
        return view('admin-create-res');
    }

    public function showAdminShowUpdateResForm($id)
    {
        $reservation = Reservation::find($id);
        $customer = Customer::find($reservation['customer_id']);

        return view('admin-show-update-res', compact('id', 'reservation', 'customer'));
    }

    public function postAdminCreateRes(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:1',
            'last_name' => 'required|min:3',
            'middle_initial' => 'required|min:1',
            'phone' => 'required|min:10',
            'email' => 'required|min:5',
            'date_of_birth' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'room_type' => 'required|min:3',
            'room_number' => 'required|min:3'
        ]);


        $customer = Customer::create([

            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'middle_initial' => $request->input('middle_initial'),
            'phone' => $request->input('phone'),
            'phone_secondary' => $request->input('phone_secondary'),
            'email' => $request->input('email'),
            'date_of_birth' => $request->input('date_of_birth'),
        ]);

        $customer->save();

        $reservation = Reservation::create([
            'check_in_date' => $request->input('check_in_date'),
            'check_out_date' => $request->input('check_out_date'),
            'room_type' => $request->input('room_type'),
            'room_number' => $request->input('room_number'),
            'customer_id' => $customer['id'],
            'room_status' => 'active'
        ]);

        $reservation->save();


        return redirect()->route('admin.dashboard');
    }

    public function postAdminUpdateRes(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:1',
            'last_name' => 'required|min:3',
            'middle_initial' => 'required|min:1',
            'phone' => 'required|min:10',
            'phone_secondary' => 'required|min:10',
            'email' => 'required|min:5',
            'date_of_birth' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'room_type' => 'required|min:3',
            'room_number' => 'required|min:3'
        ]);

        $id = $request->input('reservationId');

        $reservation = Reservation::find($id);

        $reservation['check_in_date'] = $request->input('check_in_date');
        $reservation['check_out_date'] = $request->input('check_out_date');
        $reservation['room_type'] = $request->input('room_type');
        $reservation['room_number'] = $request->input('room_number');

        $reservation->save();

        $customer = Customer::find($reservation['customer_id']);

        $customer['first_name'] = $request->input('first_name');
        $customer['last_name'] = $request->input('last_name');
        $customer['middle_initial'] = $request->input('middle_initial');
        $customer['phone'] = $request->input('phone');
        $customer['phone_secondary'] = $request->input('phone_secondary');
        $customer['email'] = $request->input('email');
        $customer['date_of_birth'] = $request->input('date_of_birth');

        $customer->save();


        return redirect()->route('admin.get-all-reservations');
    }

    public function getAllReservations()
    {
        $reservations = Reservation::all();

        return view('all-reservations', compact('reservations'));
    }

    public function getAllReservationsFilterByCheckIn(Request $request)
    {
        $this->validate($request, [
            'min_check_in_date' => 'required',
            'max_check_in_date' => 'required'
        ]);

        $minCheckInDate = $request->input('min_check_in_date');
        $maxCheckInDate = $request->input('max_check_in_date');

        $reservations = Reservation::all()->where('check_in_date', '>=', $minCheckInDate)
            ->where('check_in_date', '<=', $maxCheckInDate)
            ->sortBy('check_in_date');


        return view('all-reservations', compact('reservations'));
    }

    public function getAllCustomers()
    {
        $customers = Customer::all();

        return view('admin-all-customers', compact('customers'));
    }

    public function getDeleteRoute($id)
    {
        $reservation = Reservation::where('id', $id)->first();
        if (!$reservation) {
            return redirect()->back();
        }

        //testing for private function
        $activeReservations = $this->checkConflictingReservations($reservation['check_in_date'],
            $reservation['check_out_date']);


        return view('admin-delete-reservation',
            compact('reservation'),
            compact('activeReservations'));
    }

    public function postDeleteReservation($id)
    {
        $reservation = Reservation::where('id', $id)->first();
        $operation = 'cancelled';
        if (!$reservation) {
            return redirect()->back();
        }

        $reservation['cancelled'] = 'true';
        $reservation->save();

        return redirect()->route('admin.get-all-reservations');
    }


    //------------------PRIVATE FUNCTIONS-----------------------
    // Checks to see if the dates of the new reservation conflict with any other reservation dates
    private function checkConflictingReservations($check_in_date, $check_out_date)
    {
        // get all active reservations
        $allActiveReservations = Reservation::where('room_status', '=', 'active')->get();

        //calculate the number of days for the reservation
        $newCheckIn = date_create_from_format('Y-m-d', $check_in_date);
        $newCheckOut = date_create_from_format('Y-m-d', $check_out_date);
        $newResDuration = date_diff($newCheckIn, $newCheckOut)->format('%a');

        //loop to get all days within the reservation
        $newResDays = array();
        for ($i = 0; $i < $newResDuration - 1; $i++) {
            $newDate = date_add($newCheckIn, date_interval_create_from_date_string(strval($i) . " days"));
            array_push($newResDays, $newDate->format('Y-m-d'));
        }

        //loop through active reservations
        foreach ($allActiveReservations as $compareReservation) {
            //array to hold all the comparison dates
            $compareArray = array();
            $compareRoom = $compareReservation['room_number'];
            $compareCheckIn = $compareReservation['check_in_date'];
            $compareCheckOut = $compareReservation['check_out_date'];

            //calculate the length of each stay
            //convert to private function later
            //calculate the number of days for the reservation
            $newCheckIn = date_create_from_format('Y-m-d', $compareCheckIn);
            $newCheckOut = date_create_from_format('Y-m-d', $compareCheckOut);
            $newResDuration = date_diff($newCheckIn, $newCheckOut)->format('%a');

            //loop to get all days within the reservations. Place them into an array
            $dateArray = array();
            for ($i = 0; $i < $newResDuration - 1; $i++) {
                $compareDate = date_add($newCheckIn, date_interval_create_from_date_string(strval($i) . " days"));
                array_push($dateArray, $compareDate->format('Y-m-d'));
            }

            //push room number and date array into the compare
            $compareArray[$compareRoom] =$dateArray;
            return $compareArray;
        }
    }
}

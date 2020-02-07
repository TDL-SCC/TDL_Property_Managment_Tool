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

    public function postAdminCreateRes(Request $request)
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
            'room_number' => 'required|min:4'
        ]);
        
        $customer = new Customer([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'middle_initial' => $request->input('middle_initial'),
            'phone' => $request->input('phone'),
            'phone_secondary' => $request->input('phone_secondary'),
            'email' => $request->input('email'),
            'date_of_birth' => $request->input('date_of_birth'),
        ]);
            $customer->save();

        $reservation = new Reservation([
                'check_in_date' => $request->input('check_in_date'),
                'check_out_date' => $request->input('check_out_date'),
                'room_type' => $request->input('room_type'),
                'room_number' => $request->input('room_number')
        ]);
            $reservation->save();


        return redirect()->route('admin');
    }
}

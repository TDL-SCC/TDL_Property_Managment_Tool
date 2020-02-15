@extends('layouts.app')

@section('content')
    <section class="container">
        <h2>Cancel Reservation?</h2>
        <p>Are you sure you want to cancel reservation:</p>


        <ul class="my-5">
            <li>ID: {{ $reservation['id'] }}</li>
            <li>Customer: {{ $reservation['customer_id'] }}</li>
            <li>Check-in Date: {{ $reservation['check_in_date'] }}</li>
            <li>Check-out Date: {{ $reservation['check_out_date'] }}</li>
            <li>Room Type: {{ $reservation['room_type'] }}</li>
            <li>Room Number: {{ $reservation['room_number'] }}</li>
        </ul>


            <form action="{{ route('admin.delete-reservation', ['id' => $reservation['id']]) }}"
                  method="post" class="my-3">
                <div>
                <a href="{{ route('admin.get-all-reservations') }}"
                   class="btn btn-outline-primary">Back to Reservations</a>

                <input
                    class="btn btn-outline-danger"
                    type="submit"
                    name="confirmCancelInput"
                    value="Confirm Cancellation">


                {{csrf_field()}}
                </div>
            </form>

    </section>


@endsection

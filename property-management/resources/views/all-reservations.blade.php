@extends('layouts.app')

@section('content')
<section class="container">
    <h2>All Reservations</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Check-In Date</th>
            <th>Check-Out Date</th>
            <th>Room Type</th>
            <th>Room Number</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @if(count($reservations->all())> 0)
                @foreach($reservations as $reservation)
                    <tr>
                        <td class="my-auto">{{ $reservation['customer_id'] }}</td>
                        <td>{{ $reservation['check_in_date'] }}</td>
                        <td>{{ $reservation['check_out_date'] }}</td>
                        <td>{{ $reservation['room_type'] }}</td>
                        <td>{{ $reservation['room_number'] }}</td>
                        <td><a href="{{ route('admin.show-update-res', ['id' => $reservation['id']])}}" class="btn btn-outline-primary">Update</a></td>
                        <td><a href="" class="btn btn-outline-danger">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
</section>


@endsection

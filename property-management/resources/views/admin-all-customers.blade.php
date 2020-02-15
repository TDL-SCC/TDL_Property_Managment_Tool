@extends('layouts.app')

@section('content')
<section class="container">
    <h2>All Customers</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Middle Initial</th>
            <th>Phone (Primary)</th>
            <th>Phone (Secondary)</th>
            <th>E-mail</th>
            <th>Date of Birth</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @if(count($customers->all())> 0)
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer['first_name'] }}</td>
                        <td>{{ $customer['last_name'] }}</td>
                        <td>{{ $customer['middle_initial'] }}</td>
                        <td>{{ $customer['phone'] }}</td>
                        <td>{{ $customer['phone_secondary'] }}</td>
                        <td>{{ $customer['email'] }}</td>
                        <td>{{ $customer['date_of_birth'] }}</td>
                        <td><a href="" class="btn btn-outline-primary">Update</a></td>
                        <td><a href="" class="btn btn-outline-danger">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
</section>


@endsection

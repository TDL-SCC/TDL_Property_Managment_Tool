@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Reservation #{{$reservation['id']}}</div>
                <div class="container">
                    <h1>Thank you for staying at Hotel!</h1> 
                    <br>
                    <h2>Customer information:</h2>
                        <div class="col-md-12">
                            <p>Name: {{$customer['first_name']}}&nbsp;{{$customer['last_name']}}<br>Email: {{$customer['email']}}<br>Phone Number: {{$customer['phone']}}<br>Secondary: {{$customer['phone_secondary']}}</p>
                        </div>
                    <br>
                    <h2>Reservation information:</h2>
                    <br>
                    <div class="table responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Check-In Date:</th>
                                <th>Check-out Date:</th>
                                <th>Room Type:</th>
                                <th>Room Number:</th>
                                <th>Nightly Rate:</th>
                                <th>Number of Nights:</th>
                                <th>Total:</th>
                            </tr>
                            <tr>
                                <td>{{$reservation['check_in_date']}}</td>
                                <td>{{$reservation['check_out_date']}}</td>
                                <td>{{$reservation['room_type']}}</td>
                                <td>{{$reservation['room_number']}}</td>
                                <td>*Will show nightly here*{{$price}} per night</td>
                            <td>{{$days}}</td>
                                <td>*Total*</td>
                            </tr>
                        </table>
                    </div>
                   <h2>Payment information:</h2>
                    <br>
                    <div class="table responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Card Number:</th>
                                    <th>Exp:</th>
                                </tr>
                                <tr>
                                    <td>*Card Number</td>
                                    <td>*expMonth/expYear</td>
                                    {{-- <td>{{$card['cardNumber']}}</td>
                                    <td>{{$card['expMonth']}}/{{$card['expYear']}}</td> --}}
                                </tr>
                            </table>
                        </div>

        
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
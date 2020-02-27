@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Reservation #{{$reservation['id']}}</div>

                <div class="card-body">
                    <div class="mx-2">

                        <div class="row">
                            <h4>Customer:</h4>
                        </div>
                        
                        <div class="row">
                            <div class="col-3">
                                <h5>Name: </h5>
                            </div>
                            <div class="col-9">
                                <p>{{$customer['first_name']}} {{$customer['middle_initial']}} {{$customer['last_name']}}</p>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-3">
                                <h5>Email: </h5>
                            </div>
                            <div class="col-9">
                                <p>{{$customer['email']}}</p>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-3">
                                <h5>Primary Phone: </h5>
                            </div>
                            <div class="col-9">
                                <p>{{$customer['phone']}}</p>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-3">
                                <h5>Secondary Phone: </h5>
                            </div>
                            <div class="col-9">
                                <p>{{$customer['phone_secondary']}}</p>
                            </div>
                        </div>
    
                        <div class="row">
                            <h4>Reservation:</h4>
                        </div>
    
                        <div class="row">
                            <div class="col-3">
                                <h5>Check-In Date: </h5>
                            </div>
                            <div class="col-9">
                                <p>{{$reservation['check_in_date']}}</p>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-3">
                                <h5>Check-In Date: </h5>
                            </div>
                            <div class="col-9">
                                <p>{{$reservation['check_out_date']}}</p>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-3">
                                <h5>Room Type: </h5>
                            </div>
                            <div class="col-9">
                                <p>{{$reservation['room_type']}} (${{$price['price']}} per night)</p>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-3">
                                <h5>Room Number: </h5>
                            </div>
                            <div class="col-9">
                                <p>{{$reservation['room_number']}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div>
                                <a href="{{ route('admin.show-update-res', ['id' => $reservation['id']])}}"
                                    class="btn btn-outline-primary mx-2">Update Reservation</a>
                             
                                 <a href="{{ route('admin.get-delete-reservation', ['id' => $reservation['id']]) }}"
                                    class="btn btn-outline-danger mx-2">Cancel Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
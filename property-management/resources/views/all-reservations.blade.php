@extends('layouts.app')

@section('content')
    <section class="container">
        <h2>All Reservations</h2>

        <div class="accordion" id="filterAccordion">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Filter by Check-In Date
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" data-parent="#filterAccordion">
                    <div class="card-body">
                        <form action="{{ route('admin.get-all-reservations-by-check-in-date')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="min_check_in_date" class="col-md-2 col-form-label text-md-right">{{ __('Min Check-In Date') }}</label>

                                <div class="col-md-4">
                                    <input id="min_check_in_date" type="date" class="form-control @error('min_check_in_date') is-invalid @enderror" name="min_check_in_date" value="{{ old('min_check_in_date') }}" required autocomplete="min check in date">

                                    @error('min_check_in_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <label for="max_check_in_date" class="col-md-2 col-form-label text-md-right">{{ __('Max Check-In Date') }}</label>

                                <div class="col-md-4">
                                    <input id="max_check_in_date" type="date" class="form-control @error('max_check_in_date') is-invalid @enderror" name="max_check_in_date" value="{{ old('max_check_in_date') }}" required autocomplete="max check in date">

                                    @error('max_check_in_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Filter Reservations') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

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
                    @if($reservation['cancelled'] != 'true')
                        <tr>
                            <td class="my-auto">{{ $reservation['customer_id'] }}</td>
                            <td>{{ $reservation['check_in_date'] }}</td>
                            <td>{{ $reservation['check_out_date'] }}</td>
                            <td>{{ $reservation['room_type'] }}</td>
                            <td>{{ $reservation['room_number'] }}</td>

                            @if($reservation['room_status'] == 'active')
                                <td><a href=""
                                       class="btn btn-outline-primary" data-toggle = "modal" data-target = "#checkInModal">Check-In Guest</a></td>


                                <!-- Modal -->
                                <div class="modal fade" id="checkInModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Would you like to check-in Guest: {{ $reservation['customer_id'] }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="{{ route('admin.check-guest-in', ['id' => $reservation['id']] ) }}" class="btn btn-primary">Check Guest In</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($reservation['room_status'] == 'checked-in')
                                <td><a href=""
                                       class="btn btn-outline-primary" data-toggle = "modal" data-target = "#checkOutModal">Check-In Guest</a></td>


                                <!-- Modal -->
                                <div class="modal fade" id="checkOutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Would you like to check-out Guest: {{ $reservation['customer_id'] }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="{{ route('admin.check-guest-out', ['id' => $reservation['id']] ) }}" class="btn btn-warning">CHECK OUT</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($reservation['room_status'] == 'checked-out')
                                <td><a href="{{ route('admin.get-receipt', ['id' => $reservation['id']])}}"
                                    class="btn btn-outline-primary">View Receipt</a></td>
                            @endif
                            <td><a href="{{ route('admin.get-reservation', ['id' => $reservation['id']])}}"
                                class="btn btn-outline-primary">View Reservation</a></td>

                            <td><a  href="{{ route('admin.show-update-res', ['id' => $reservation['id']])}}"
                                    @if($reservation['room_status'] == 'checked-out')
                                        class="btn btn-outline-secondary disabled"
                                    @else
                                        class="btn btn-outline-primary"
                                    @endif
                                    >Update Reservation</a></td>

                            <td>
                                <a href="{{ route('admin.get-delete-reservation', ['id' => $reservation['id']]) }}"
                                   @if($reservation['room_status'] == 'checked-out')
                                   class="btn btn-outline-secondary disabled"
                                   @else
                                   class="btn btn-outline-danger"
                                    @endif
                                >Cancel Reservation</a>
                            </td>

                        </tr>
                    @endif
                @endforeach
            @endif
            </tbody>

        </table>
    </section>


@endsection

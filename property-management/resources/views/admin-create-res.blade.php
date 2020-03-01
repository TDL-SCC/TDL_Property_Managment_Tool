@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Guest Reservation') }}</div>

                

                <div class="card-body">
                <div class="form-group row">
                </div>
                    <form method="POST" action="{{ route('admin.create-res.submit') }}">
                        @csrf

                        <div class="form-group row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>New Guest Information:</strong>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="middle_initial" class="col-md-4 col-form-label text-md-right">{{ __('Middle Initial') }}</label>
                            
                            <div class="col-md-2"> 
                                <input id="middle_initial" type="char" class="form-control @error('middle_initial') is-invalid @enderror" name="middle_initial" value="{{ old('middle_initial') }}" required autocomplete="middle name">

                                @error('middle_initial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number Primary') }}</label>

                            <div class="col-md-3">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone-1">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_secondary" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number Secondary') }}</label>

                            <div class="col-md-3">
                                <input id="phone_secondary" type="text" class="form-control @error('phone_secondary') is-invalid @enderror" name="phone_secondary" value="{{ old('phone_secondary') }}" required autocomplete="phone-2">

                                @error('phone_secondary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-4">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date of birth">

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Reservation Information:</strong>
                        </div>

                        <div class="form-group row">
                            <label for="check_in_date" class="col-md-4 col-form-label text-md-right">{{ __('Check-in Date') }}</label>

                            <div class="col-md-4">
                                <input id="check_in_date" type="date" class="form-control @error('check_in_date') is-invalid @enderror" name="check_in_date" value="{{ old('check_in_date') }}" required autocomplete="check in date">

                                @error('check_in_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="check_out_date" class="col-md-4 col-form-label text-md-right">{{ __('Check-out Date') }}</label>

                            <div class="col-md-4">
                                <input id="check_out_date" type="date" class="form-control @error('check_out_date') is-invalid @enderror" name="check_out_date" value="{{ old('check_out_date') }}" required autocomplete="check out date">

                                @error('check_out_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room_type" class="col-md-4 col-form-label text-md-right">{{ __('Room Type') }}</label>
                            
                            <div class="col-md-3"> 
                                <input id="room_type" type="text" class="form-control @error('room_type') is-invalid @enderror" name="room_type" value="{{ old('room_type') }}" required autocomplete="room type">

                                @error('room_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room_number" class="col-md-4 col-form-label text-md-right">{{ __('Room Number') }}</label>
                            
                            <div class="col-md-3"> 
                                <select id="room_number" 
                                class="form-control @error('room_number') is-invalid @enderror" 
                                name="room_number" 
                                value="{{ old('room_number') }}" 
                                required autocomplete="room number">
                                    <option>Please Select Dates First</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register New Reservation') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
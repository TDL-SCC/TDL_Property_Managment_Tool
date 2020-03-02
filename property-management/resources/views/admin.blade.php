@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as <strong>ADMIN</strong>
                </div>
                <div class="card-body">
                    <h1>Reservations:</h1>
                    <a href="{{route('admin.get-all-reservations')}}">
                        <button type="button" class="btn btn-primary">
                            {{ __('View All') }}
                        </button>
                    </a>
                    <a href="{{route('admin.create-res')}}">
                        <button type="button" class="btn btn-success">
                            {{ __('Create New') }}
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <h1>Customers:</h1>
                    <a href="{{route('admin.get-all-customers')}}">
                        <button type="button" class="btn btn-primary">
                            {{ __('View All') }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

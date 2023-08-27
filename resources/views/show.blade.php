@extends('master')

@section('title', 'Room Details')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Room Details</b></div>
            <div class="col col-md-6 text-right">
                <a href="{{ route('rooms.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form">Number</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $room->number }}</p>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form">Type</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $room->type }}</p>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Availability</b></label>
            <div class="col-sm-10">
                {{ $room->availability ? "1" : "0" }}
            </div>
        </div>
        </div>  
    </div>
</div>

@endsection('content')
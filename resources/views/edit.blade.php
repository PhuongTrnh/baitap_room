@extends('master')

@section('title', 'Edit Room')

@section('content')

<div class="card">
    <div class="card-header">Edit Room</div>
    <div class="card-body">
        <form method="post" action="{{ route('rooms.update', $room->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="number">Number</label>
                <input type="number" class="form-control" id="number" name="number" value="{{ old('number') }}" required>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="suite">Suite</option>
                </select>
            </div>

            <div class="form-group">
                <label for="availability">availability</label>
                <select class="form-control" id="availability" name="availability" required>
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>              
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $room->id }}" />
                <input type="submit" class="btn btn-primary" value="Save" />
            </div>
        </form>
    </div>
</div>

@endsection('content')

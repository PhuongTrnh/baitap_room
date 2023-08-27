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
                    <input type="number" min="0" name="number" class="form-control" value="1" value="{{ $room->number }}"/>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="standard">Standard</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="suite">Suite</option>
                </select>
            </div>

            <div class="form-group">
                <label for="availability">availability</label>
                <select class="form-control" id="availability" name="availability" required>
                    <option value="available">Available</option>
                    <option value="occupied">Occupied</option>
                    <option value="under maintenance">Under maintenance</option>    
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

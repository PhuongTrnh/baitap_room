@extends('master')

@section('title', 'Create Employee')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

    @endforeach
    </ul>
</div>

@endif

<div class="card">
    <div class="card-header">Add Room</div>
    <div class="card-body">
        <form method="post" action="{{ route('rooms.store') }}" enctype="multipart/form-data">
            @csrf
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
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
</div>

@endsection('content')

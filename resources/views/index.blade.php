@extends('master')

@section('title', 'Rooms')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Room Data</b></div>
                <div class="col col-md-6 text-right">
                    <a href="{{ route('rooms.create') }}" class="btn btn-success btn-sm float-end">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Type</th>
                    <th>Availability</th>
                    <th width="280px">Action</th>
                </tr>
                @if (count($data) > 0)
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->number }}</td>
                            <td>{{ $row->type}}</td>
                            <td>{{ $row->availability }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('rooms.show', $row->id) }}">Detail</a>
                                <a class="btn btn-warning" href="{{ route('rooms.edit', $row->id) }}">Edit</a>
                                <a class="btn btn-danger" href="#" data-id={{ $row->id }} data-toggle="modal"
                                    data-target="#{{ $row->id }}">Delete</a>
                                <!-- Modal -->
                                <form action="{{ route('rooms.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal fade" id="{{ $row->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete room</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure delete the room with id: {{ $row->id }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                    </tr>
                @endif
            </table>
            {!! $data->links('pagination::bootstrap-5') !!}
        </div>
    </div>

@endsection

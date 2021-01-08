@extends('layouts.app')


@section('content')


<div class="container">
    <!-- button -->
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#logModal">Add</button>
        </div>
        <div class="col-md-12 text-left">
            <h1>Log Hours</h1>
        </div>

    </div>


    <table class="table table-striped table-sm table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">Hours</th>
                <th scope="col">Date</th>
                <th scope="col">Confirmed</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <th scope="row">{{$log->id}}</th>
                <th scope="row">{{$log->description}}</th>
                <th scope="row">{{$log->hours}}</th>
                <th scope="row">{{ date('d-m-Y', strtotime($log->date)) }}</th>
                <th scope="row">{{ $log->confirmed == 0 ? 'Not yet' : 'Yes' }}</th>
                <td>
                    <form method="POST" action="{{ url('log')}}/{{$log->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Remove</button>
                    </form>
                    <button type="button" id="edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalTwo-{{ $log->id }}" >Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="logModal" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileLabel">Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="log">
                    @csrf
                    <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
                    <input type="text" hidden name="confirmed" value="0">

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" value="{{ old('description') }}" required>

                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hours">Hours</label>
                        <input type="text" name="hours" class="form-control" id="hours" value="{{ old('hours') }}" required>

                        @error('hours')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date" value="{{ old('date' )}}" required>
                        @error('date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($logs as $log)
<div class="modal fade" id="modalTwo-{{ $log->id }}" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileLabel">Edit log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="{{ route('log.update', $log->id) }}">
                    @csrf
                    @method('PATCH')
                    <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
                    <input type="text" hidden name="confirmed" value="0">

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" value="{{ $log->description }}" required>

                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hours">Hours</label>
                        <input type="text" name="hours" class="form-control" id="hours" value="{{ $log->hours }}" required>

                        @error('hours')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date" value="{{ $log->date }}" required>
                        @error('date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@if (count($errors) > 0)
    <script>
        $( document ).ready(function() {
            $('#logModal').modal('show');
        });
    </script>
@endif

@endsection
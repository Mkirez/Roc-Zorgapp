@extends('layouts.app')

@section('content')
<!-- modal button -->
<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">Add</button>
        </div>
        <div class="col-md-12 text-left">
            <h1>Competitions</h1>
        </div>

    </div>

    <!-- table -->
    <table class="table table-striped table-sm table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">File</th>
                <th scope="col">Qualification File</th>
                <th scope="col">Achieved</th>
                <th scope="col">Created</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($competitions as $competition)
            <tr>
                <th scope="row">{{ $competition->id }}</th>
                <th scope="row">{{ $competition->name }}</th>
                <th scope="row"><a target="_blank" href="{{ $competition->file }}">view</a></th>
                <th scope="row">{{ $qualification_file->name }}</th>
                <th scope="row">{{ $competition->achieved }}</th>
                <th scope="row">{{ $competition->created_at->diffForHumans() }}</th>
                <td>
                    <button type="button" id="edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalTwo-{{ $competition->id }}" >Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- modal Competition -->

<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Competition</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="POST" enctype="multipart/form-data" action="{{route('competition.store')}}">
                        <div>
                            @csrf
                            <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
                            <input type="text" hidden name="qualification_file_id" value="{{ $qualification_file->id }}">
                            <input type="text" hidden name="achieved" value="0">

                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required>

                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-form-label">File: (.pdf only)</label>
                            <input type="file" accept=".pdf" name="file" class="form-control" id="file" required>

                            @error('file')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- edit modal Competition -->
@foreach ($competitions as $competition)
<div>
    <div class="modal fade" id="modalTwo-{{ $competition->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTwoo" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Competition</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="POST" enctype="multipart/form-data" action="{{ route('competition.update', $competition->id) }}">
                        <div>
                            @csrf
                            @method('PATCH')

                            <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
                            <input type="text" hidden name="qualification_file_id" value="{{ $qualification_file->id }}">
                            <input type="text" hidden name="achieved" value="0">
                            {{ $competition->id }} 
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $competition->name }}" required>

                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-form-label">File: (.pdf only)</label>
                            <a>{{ basename($competition->file) }}</a>
                            <input type="file" accept=".pdf" name="file" class="form-control" id="file" value="{{ $competition->file }}">

                            @error('file')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

</script>
@if (count($errors) > 0)
<script>
    $(document).ready(function() {
        $('#modalTwo').modal('show');
    });
</script>
@endif
@endsection
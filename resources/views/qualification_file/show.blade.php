@extends('layouts.app')

@section('content')
<!-- modal button -->
<div class="container">
    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add
    </button>
    <!-- modal -->
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
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-form-label">File:</label>
                            <input type="file" name="file" class="form-control" id="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
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
                <th scope="row">{{ $competition->file }}</th>
                <th scope="row">{{ $qualification_file->name }}</th>
                <th scope="row">{{ $competition->achieved }}</th>
                <th scope="row">{{ $competition->created_at->diffForHumans() }}</th>
                <th scope="row"></th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
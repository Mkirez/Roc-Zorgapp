@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        @if(auth()->user()->education())
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">Add</button>
        </div>
        @endif
        @if($files->count() > 0 )
        <div class="col-md-12 text-left">
            <h1>Qualification files</h1>
        </div>
        @foreach ($files as $file )

        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $file->name }}</h5>
                    <p class="card-text">Schooljaar: #</p>
                    <div class="flex">
                        <!-- @if(auth()->user()->student()) -->
                        <a href="{{url('qualification_file')}}/{{$file->id}}" class="btn btn-sm btn-primary">View</a>
                        <!-- @endif -->
                        @if(auth()->user()->education())
                        <form method="post" action="{{url('qualification_file')}}/{{$file->id}}"> @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div>No qualification files yet.</div>
        @endif
    </div>
</div>






<!-- modal  -->
@if(auth()->user()->education())
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Qualification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" enctype="multipart/form-data" action="{{ route('qualification_file.store') }}">
                    @csrf
                    <div>
                        <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>

                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" name="file" class="form-control" id="file" required>

                            @error('file')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="total_number_of_competitions">Total number of competitions</label>
                            <input type="text" name="total_number_of_competitions" class="form-control" id="total_number_of_competitions" required>

                            @error('total_number_of_competitions')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@if (count($errors) > 0)
    <script>
        $( document ).ready(function() {
            $('#exampleModal').modal('show');
        });
    </script>
@endif

@endsection
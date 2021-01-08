@extends('layouts.app')

@section('content')
<!-- modal button -->
<div class="container">
    <div class="row">
        @if(auth()->user()->education())
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">Add Competition</button>
        </div>
        @endif
        <div class="col-md-12 text-left">
            <h2>Competitions - {{ $qualification_file->name }}</h2>
        </div>

    </div>
    <!-- table -->
    <table class="table table-striped table-sm table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                @if(auth()->user()->student())
                <th scope="col">File</th>
                <th scope="col">Achieved</th>
                @endif
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($competitions as $competition)
            <tr>
                <th scope="row">{{ $competition->name }}</th>
                @if(auth()->user()->student())

                <th scope="row"><a target="_blank" href="{{ $student_files->where('competition_id', $competition->id)->pluck('file')->first() }}">{{ basename($student_files->where('competition_id', $competition->id)->pluck('file')->first()) }}</a></th>
                <th scope="row">{{ $student_files->where('competition_id', $competition->id)->pluck('achieved')->first() == 0 ? 'Not Yet' : 'Yes' }}</th>

                @endif
                <td>
                    @if(auth()->user()->education())
                    <button type="button" id="edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalTwo-{{ $competition->id }}">Edit</button>
                    <form method="POST" action="{{ url('competition') }}/{{ $competition->id }}"> @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this?')" data-toggle="confirmation">Remove</button>
                    </form>
                    @else
                    <button type="button" id="edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalAddFile-{{ $competition->id }}">Add file</button>
                    @if (count($competition->student_files()->where('user_id', auth()->id())->get()) > 0)
                    <form method="post" action="{{ url('student_file') }}/{{ $student_files->where('competition_id', $competition->id)->pluck('id')->first() }}"> @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this?')" data-toggle="confirmation">Remove</button>
                    </form>
                    @endif

                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- modal create/update student_file -->

@foreach ($competitions as $competition)
<div>
    <div class="modal fade" id="modalAddFile-{{ $competition->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $competition->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="POST" enctype="multipart/form-data" action="{{ route('student_file.store') }}">
                        @csrf
                        <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
                        <input type="text" hidden name="competition_id" value="{{ $competition->id }}">
                        <input type="text" hidden name="achieved" value="0">

                        <div class="form-group">
                            <label for="file" class="col-form-label">File: (.pdf only)</label>
                            <input type="file" accept=".pdf" name="file" class="form-control" id="file" required>

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

<!-- modal create Competition -->

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
                    <form class="form-group" method="POST" enctype="multipart/form-data" action="{{ route('competition.store') }}">
                        <div>
                            @csrf
                            <input type="text" hidden name="qualification_file_id" value="{{ $qualification_file->id }}">

                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required>

                            @error('name')
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
<!-- modal update Competition -->
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

                            <input type="text" hidden name="qualification_file_id" value="{{ $qualification_file->id }}">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $competition->name }}" required>

                            @error('name')
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
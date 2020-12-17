@extends('layouts.app')


@section('content')
@if($files->count() > 0 )
<div class="container">
<div class="row">
    @foreach ($files as $file )

<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$file->name}}</h5>
            <p class="card-text">Schooljaar: #</p>
            <div class="items-center">
                <a href="{{url('qualification_file')}}/{{$file->id}}" class="btn btn-sm btn-primary">View</a>
                @if(Auth::user()->user_type == 0)
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
</div>
</div>

@else
<div>No qualification files yet.</div>
@endif





<!-- create qualicication file form only for Education  -->
@if(Auth::user()->user_type == 0)
<div class="container">
    <form class="form-group" method="POST" enctype="multipart/form-data" action="{{route('qualification_file.store')}}">
        @csrf
        <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" class="form-control" id="file">
        </div>
        <div class="form-group">
            <label for="total_number_of_competitions">Total number of competitions</label>
            <input type="text" name="total_number_of_competitions" class="form-control" id="total_number_of_competitions">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endif

@endsection
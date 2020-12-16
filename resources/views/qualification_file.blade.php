@extends('layouts.app')


@section('content')

@if($files)
<div class="row"></div>
@foreach ($files as $file )

<div class="col-md-4">
    <div class="card" style="width: 18rem;">
        <div class="col-md-10 text-center project-title" style="padding: 10px;">
            <h1 class="card-title">{{$file->name}}</h1>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <form method="post" action="{{url('qualification_file')}}/{{$file->id}}"> @csrf
                        @method('DELETE')
                        <button type="submit" onclick="delete_message()" class="btn btn-sm btn-outline-secondary">Verwijder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
@endif
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

@endsection
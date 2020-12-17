@extends('layouts.app')

@section('content')

<div class="container">
    <form class="form-group" method="POST" enctype="multipart/form-data" action="{{route('qualification_file.store')}}">
        @csrf
        <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $qualification_file->name }}">
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" class="form-control" id="file" value="{{ $qualification_file->file }}">
            <img src="{{ $qualification_file->file }}" alt="your avatar" width="40px">
        </div>
        <div class="form-group">
            <label for="total_number_of_competitions">Total number of competitions</label>
            <input type="text" name="total_number_of_competitions" class="form-control" id="total_number_of_competitions" value="{{ $qualification_file->total_number_of_competitions }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
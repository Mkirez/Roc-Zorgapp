@extends('layouts.app')

@section('content')
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @foreach ($files as $file )

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="col-md-10 text-center project-title" style="padding: 10px;">
                        <h1 class="card-title">{{$file->filename}}</h1>
                    </div>

                    <div class="card-body">
                        <p class="card-text">Hier komt de info over het bestand wat gedownload moet worden.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <form method="post" action="{{url('fileupload')}}/{{$file->id}}"> @csrf
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
        <div class="d-flex vw-100 vh-100 justify-content-center align-items-center">
            <form method="POST" enctype="multipart/form-data" action="{{route('fileupload.store')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" name="uploadedfile" id="exampleFormControlFile1">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">File description</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="description" type="text"></textarea>
                </div>
                <div class="form-group"><button class="btn btn-success">Upload the file</button></div>
            </form>
        </div>
    </div>
</div>
@endsection
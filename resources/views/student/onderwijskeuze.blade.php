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
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>        
            @endforeach 
        </div> 
    </div>
</div>
@endsection       
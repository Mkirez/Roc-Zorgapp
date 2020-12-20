@extends('layouts.app')
@section('content')



<div class="container">
    <div class="row">
        <div class="col-4">
            <div>
                <p>name: {{ $user->name }}</p>
            </div>
            <div>
                <p>email: {{ $user->email }}</p>
            </div>
            <div>
                <p>orginization: {{ $user->orginization }}</p>
            </div>
            @if(auth()->user() == $user)
            <div>
                <p>password: ********</p>
            </div>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#profile">
                Edit
            </button>
            @endif
        </div>
    </div>
</div>


<!-- modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileLabel">User information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="">
                    @method('PATCH')
                    @csrf
                    <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
                    <input type="text" hidden name="qualification_file_id" value="">
                    <input type="text" hidden name="achieved" value="0">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group ">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group ">
                        <label for="orginization">Stagebedrijf</label>
                        <input type="text" name="orginization" class="form-control" id="orginization" placeholder="???" value="{{ $user->orginization }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
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
                <p>orginization: {{ $user->organization }}</p>
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
                <form class="form-group" method="POST" action="/profiles/{{ $user->id }}">
                    @csrf
                    @method('PATCH')
                    <input type="text" hidden name="user_type" value="{{ $user->user_type }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group ">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group ">
                        <label for="organization">Organization</label>
                        <input type="text" name="organization" class="form-control" id="organization" placeholder="???" value="{{ $user->organization }}" required>
                    </div>
                    <div class="form-group ">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="form-group ">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
@if(auth()->user()->education() && $user->student())
<div class="container ">
<h5>Werkprocessen</h5>
    <ul class="list-group">
        <a href=""><li class="list-group-item"aria-current="true">Hier komen de werk bestanden</li></a>
        <a href=""><li class="list-group-item"aria-current="true">Hier komen de werk bestanden</li></a>
        <a href=""><li class="list-group-item"aria-current="true">Hier komen de werk bestanden</li></a>
        <a href=""><li class="list-group-item"aria-current="true">Hier komen de werk bestanden</li></a>
        <a href=""><li class="list-group-item"aria-current="true">Hier komen de werk bestanden</li></a>
    </ul>

</div>
@endif
@endsection
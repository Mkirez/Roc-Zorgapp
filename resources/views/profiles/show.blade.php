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
            @if(auth()->user()->student())
            <div>
                <p>Intern at</p>
                <form method="POST" action="intern">
                    @csrf
                    <select name="bpv">
                        <option value="#">Choose</option>
                        @foreach ($bpvs as $bpv)

                        <option value="{{ $bpv->id }}">{{ $bpv->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>

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
    <h5>Competitions</h5>
    <ul class="list-group">
        @foreach ($user->competitions() as $competition)

            <li class="list-group-item" aria-current="true">{{ $competition->name }}</li>
            <form method="POST" action="{{ route('approveCompetition', $competition->id) }}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-sm btn-outline-secondary">{{ $competition->achieved == 0 ? 'Approve' : 'Undo' }}</button>
            </form>

        @endforeach
    </ul>
    <br>
    <h5>Logs</h5>
    <ul class="list-group">
        @foreach ($user->logs() as $log)
        <li class="list-group-item" aria-current="true">
            <p>{{ $log->description }}</p>
            <p>{{ $log->hours }}</p>
            <form method="POST" action="{{ route('approveLog', $log->id) }}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-sm btn-outline-secondary">{{ $log->confirmed == 0 ? 'Approve' : 'Undo' }}</button>
            </form>
        </li>

        @endforeach
    </ul>
</div>
@endif
@endsection
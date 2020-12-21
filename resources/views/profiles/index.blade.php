@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-striped table-sm table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Intern at</th>
                <th scope="col">Status Competitions</th>
                <th scope="col">Hours</th>
                <th scope="col">Member Since</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <th scope="row">{{ $student->id }}</th>
                <th scope="row">{{ $student->name }}</th>
                <th scope="row">{{ $student->organization }}</th>
                <th scope="row"></th>
                <th scope="row"></th>
                <th scope="row">{{ date('d/m/Y', strtotime($student->created_at)) }}</th>
                <td>
                    <a href="{{ route('profile', $student->id) }}">view</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
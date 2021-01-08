@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Students</h2>
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    <table class="table table-striped table-sm table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                @if(!auth()->user()->bpv())
                <th scope="col">Intern at</th>
                <th scope="col">Status Competitions</th>
                @endif
                <th scope="col">Hours</th>
                <th scope="col">Member Since</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($students as $student)
            <tr>
                <th scope="row">{{ $student->id }}</th>
                <th scope="row">{{ $student->name }}</th>
                @if(!auth()->user()->bpv())
                <th scope="row">{{ $student->interns_at()->pluck('name')->first() ?: '???' }}</th>
                <th scope="row"></th>
                @endif
                <th scope="row">{{ $student->logs()->sum('hours') }}</th>
                <th scope="row">{{ date('d/m/Y', strtotime($student->created_at)) }}</th>
                <td>
                    <a href="{{ route('profile', $student->id) }}">view</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection
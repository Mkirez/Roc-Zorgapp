@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row mb-5">
        <div class="col-md-8 float-left">
            <h2>Students</h2>
        </div>
        <div class="col-md-4 flex-right">
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
        </div>
    </div>


    <table class="table table-striped table-sm table-hover shadow mt-4">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <th style="padding-left: 20px;" scope="col">Name</th>
                @if(!auth()->user()->bpv())
                <th scope="col">Intern at</th>
                <th scope="col">Status competitions</th>
                @endif
                <th scope="col">Hours</th>
                <th scope="col">Member Since</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($students as $student)
            <tr>
                <!-- <th scope="row">{{ $student->id }}</th> -->
                <th style="padding-left: 20px;" scope="row">{{ $student->name }}</th>
                @if(!auth()->user()->bpv())
                <th scope="row">{{ $student->interns_at()->pluck('organization')->first() ?: 'None' }}</th>
                <th scope="row">{{ $student->achieved_student_files() .'/'. count(App\Models\Qualification_file::find(1)->competitions) }}</th>
                @endif
                <th scope="row">{{ $student->logs()->sum('hours') }}</th>
                <th scope="row">{{ date('d/m/Y', strtotime($student->created_at)) }}</th>
                <td>
                    <a title="Show profile" id="edit" href="{{ route('profile', $student->id) }}">
                        <ion-icon name="open-outline"></ion-icon>
                    </a>

                    <!-- <a href="{{ route('profile', $student->id) }}">view</a> -->
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
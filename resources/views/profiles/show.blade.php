@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-4">
            <div>
                <p>Name: {{ $user->name }}</p>
            </div>
            <div>
                <p>E-mail: {{ $user->email }}</p>
            </div>

            @if(auth()->user()->education() && $user->student())
            <div>
                <p>Interns at: {{ $user->interns_at->pluck('organization')->first() }}</p>
            </div>
            @endif

            @if($user->bpv())
            <div>
                <p>Organization: {{ $user->organization }}</p>
            </div>
            @endif

            @if(auth()->user() == $user)
            <div>
                <p>Password: ********</p>
            </div>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#profileModal">
                Edit
            </button>
            @endif

            @if(auth()->user()->student())
            <div class="mt-5">
                <p>Intern at</p>
                <form method="POST" action="intern">
                    @csrf
                    <select name="bpv" required>
                        <option value="">Choose</option>
                        @foreach ($bpvs as $bpv)
                        <option value="{{ $bpv->id }}" {{ ($user->interns_at->pluck('id')->first() == $bpv->id) ? 'selected' : '' }}>
                            {{ $bpv->organization }}
                        </option>

                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-sm btn-primary ml-2">Change</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>


<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
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
                    @if(auth()->user()->bpv())
                    <div class="form-group ">
                        <label for="organization">Organization</label>
                        <input type="text" name="organization" class="form-control" id="organization" value="{{ $user->organization }}" required>
                    </div>
                    @endif
                    <div class="form-group ">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="form-group ">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
@if(auth()->user()->education() && $user->student())
<div class="container ">
    <table class="shadow table table-striped table-sm table-hover">
        <thead>
            <tr>
                <th style="padding-left: 20px;" scope="col">Name</th>
                <th scope="col">File</th>
                <!-- <th scope="col">Achieved</th> -->
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($competitions as $competition)
            <tr>
                <th style="padding-left: 20px;" scope="row">{{ $competition->name }}</th>
                <th scope="row"><a target="_blank" href="{{ $student_files->where('competition_id', $competition->id)->pluck('file')->first() }}">{{ basename($student_files->where('competition_id', $competition->id)->pluck('file')->first()) }}</a></th>
                <!-- <th scope="row">{{ $student_files->where('competition_id', $competition->id)->pluck('achieved')->first() == 0 ? 'Not Yet' : 'Yes' }}</th> -->
                <td>
                    @if (count($competition->student_files()->where('user_id', $user->id)->get()) > 0)
                    <form method="POST" action="{{ route('student_file.update', $student_files->where('competition_id', $competition->id)->pluck('id')->first()) }}">
                        @csrf
                        @method('PATCH')
                        <button title="{{ $student_files->where('competition_id', $competition->id)->pluck('achieved')->first() == 0 ? 'Approve' : 'Undo' }}" id="toggle" type="submit" style="color:{{ $student_files->where('competition_id', $competition->id)->pluck('achieved')->first() == 0 ? 'inherit' : 'green' }}; background: none; border: none; padding: 0; outline: inherit; line-height: 0px;">
                            <ion-icon name="{{ $student_files->where('competition_id', $competition->id)->pluck('achieved')->first() == 0 ? 'square-outline' : 'checkbox-outline' }}"></ion-icon>
                        </button>

                        <!-- <button type="submit">{{ $student_files->where('competition_id', $competition->id)->pluck('achieved')->first() == 0 ? 'Approve' : 'Undo' }}</button> -->
                        <!-- <button type="submit" class="btn btn-sm btn-outline-secondary">{{ $student_files->where('competition_id', $competition->id)->pluck('achieved')->first() == 0 ? 'Approve' : 'Undo' }}</button> -->
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endif

@if($logs->count() > 0)
<div class="container ">
    <table class="shadow table table-striped table-sm table-hover">
        <thead>
            <tr>
                <th style="padding-left: 20px;" scope="col">Description</th>
                <th scope="col">Hours</th>
                <th scope="col">Date</th>
                <!-- <th scope="col">Confirmed</th> -->
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <th style="padding-left: 20px;" scope="row">{{$log->description}}</th>
                <th scope="row">{{$log->hours}}</th>
                <th scope="row">{{ date('d/m/Y', strtotime($log->date)) }}</th>
                <!-- <th scope="row">{{ $log->confirmed == 0 ? 'Not yet' : 'Yes' }}</th> -->
                <td>
                    <form method="POST" action="{{ route('approveLog', $log->id) }}">
                        @csrf
                        @method('PATCH')
                        <button title="{{ $log->confirmed == 0 ? 'Approve' : 'Undo' }}" id="toggle" style="color:{{ $log->confirmed == 0 ? 'inherit' : 'green' }}; background: none; border: none; padding: 0; outline: inherit;" type="submit">
                            <ion-icon name="{{ $log->confirmed == 0 ? 'square-outline' : 'checkbox-outline' }}"></ion-icon>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <p>No logs yet.</p>
    @endif
</div>
<script>
    // $(document).ready(function() {
        // $("#toggle").hover(
        //     function() {
        //         $(this).attr("name", "checkbox-outline");
        //     },
        //     function() {
        //         $(this).attr("name", "square-outline");
        //     }
        // );
        // $("#toggle").hover(
        //     function() {
        //         $(this).attr("name", "square-outline");
        //     },
        //     function() {
        //         $(this).attr("name", "checkbox-outline");
        //     }
        // );
        //     $('#toggle').click(function() {
        //         if ($(this).attr('name') === 'square-outline') {
        //             // alert($(this).attr("name"));
        //             $(this).attr("name", "checkbox-outline");
        //         } else {
        //             $(this).attr('name', 'square-outline');
        //         }
        //     });

    // });
</script>
@endsection
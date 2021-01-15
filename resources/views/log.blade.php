@extends('layouts.app')


@section('content')


<div class="container mt-4">
    <!-- button -->
    <div class="row mb-5">
        <div class="col-md-6 text-left">
            <h1>Log Hours</h1>
        </div>
        @if(auth()->user()->interns_at()->exists())
        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#logModal">Add</button>
        </div>
        @else
        <div class="col-md-6 text-right pt-2"><strong>Update 'intern at' on profile</strong></div>
        @endif

    </div>


    <table class="shadow table table-striped table-sm table-hover">
        <thead>
            <tr>
                <th id="width_table" style="padding-left: 20px;" scope="col">Description</th>
                <th scope="col">Hours</th>
                <th scope="col">Company</th>
                <th scope="col">Date</th>
                <th scope="col">Confirmed</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <th style="padding-left: 20px;" scope="row">{{$log->description}}</th>
                <th scope="row">{{$log->hours}}</th>
                <th scope="row">{{ App\Models\User::find($log->bpv_id)->organization }}</th>
                <th scope="row">{{ date('d/m/Y', strtotime($log->date)) }}</th>
                <th scope="row">
                    <ion-icon style="cursor: default; color:{{ $log->confirmed == 0 ? 'inherit' : 'green' }};" name="{{ $log->confirmed == 0 ? 'square-outline' : 'checkbox-outline' }}"></ion-icon>
                </th>
                <td>
                <button title="Edit" id="edit" type="submit" data-toggle="modal" data-target="#modalTwo-{{ $log->id }}" style="background: none; border: none; padding: 0; outline: inherit;">
                    <ion-icon name="create-outline" ></ion-icon>
                </button>
                    <!-- <button type="button" id="edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalTwo-{{ $log->id }}">Edit</button> -->
                    <form method="POST" action="{{ url('log')}}/{{$log->id }}">
                        @csrf
                        @method('DELETE')
                        <!-- <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Remove</button> -->
                        <button title="Remove" id="remove" type="submit" onclick="return confirm('Are you sure you want to delete this?')" data-toggle="confirmation" style="background: none; border: none; padding: 0; outline: inherit;">
                            <ion-icon name="close-outline"></ion-icon>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="logModal" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileLabel">Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="log">
                    @csrf
                    <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
                    <input type="text" hidden name="confirmed" value="0">
                    <input type="text" hidden name="bpv_id" value="{{ Auth()->user()->interns_at()->pluck('id')->first() }}">

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input id="textarea_style" type="text" name="description" class="form-control" id="description" value="{{ old('description') }}" required>

                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hours">Hours</label>
                        <input type="text" maxlength="2" name="hours" class="form-control" id="hours" value="{{ old('hours') }}" required>

                        @error('hours')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date" value="{{ old('date' )}}" required>
                        @error('date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary float-right">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($logs as $log)
<div class="modal fade" id="modalTwo-{{ $log->id }}" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileLabel">Edit log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="{{ route('log.update', $log->id) }}">
                    @csrf
                    @method('PATCH')
                    <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
                    <input type="text" hidden name="bpv_id" value="{{ $log->bpv_id }}">
                    <input type="text" hidden name="confirmed" value="0">

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input id="textarea_style" type="text" name="description" class="form-control" id="description" value="{{ $log->description }}" required>

                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hours">Hours</label>
                        <input type="text" maxlength="2" name="hours" class="form-control" id="hours" value="{{ $log->hours }}" required>

                        @error('hours')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date" value="{{ $log->date }}" required>
                        @error('date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@if (count($errors) > 0)
<script>
    $(document).ready(function() {
        $('#logModal').modal('show');
    });
</script>
@endif

@endsection
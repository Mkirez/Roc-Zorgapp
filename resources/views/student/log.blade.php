@extends('layouts.app')
@section('content')
<!-- die action zegt ga in de todocontroller en pak de store methode/function -->




<!-- projecten maken -->


<div class="container">
      <!-- button -->
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add</button>
        </div>
    </div>


    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="POST" action="log">
                    @csrf
                    <input type="text" hidden name="user_id" value="{{ Auth()->id() }}">
                    <input type="text" hidden name="confirmed" value="0">
                    <div class="col-md-12 inner-text">
                        <h1>Log hours</h1>
                    </div>
                    <div class="inner-form">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description">
                        </div>
                        <div class="form-group">
                            <label for="hours">Hours</label>
                            <input type="text" name="hours" class="form-control" id="hours">
                        </div>

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control" id="date">
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">Hours</th>
                <th scope="col">Date</th>
                <th scope="col">Confirmed</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <th scope="row">{{$log->id}}</th>
                <th scope="row">{{$log->description}}</th>
                <th scope="row">{{$log->hours}}</th>
                <th scope="row">{{ date('d-m-Y', strtotime($log->date)) }}</th>
                @if($log->confirmed == 0)
                <th scope="row">Not yet</th>
                @else
                <th scope="row">Yes</th>
                @endif
                <td>
                    <form method="POST" action="{{url('log')}}/{{$log->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="delete_message()" class="btn btn-sm btn-outline-secondary">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
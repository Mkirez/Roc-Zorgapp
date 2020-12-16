@extends('layouts.app')

@section('content')
<div class="wrapper" style="padding: 130px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Welcome <span>{{ Auth::user()->name }}</span></h1>
            </div>
        </div>
    </div>
</div>
@endsection

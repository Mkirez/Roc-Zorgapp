@extends('layouts.app')

@section('content')
    <body>
        <div class="d-flex vw-100 vh-100 justify-content-center align-items-center">
            <img src="{{$savedfile->filename}}" alt="">
        </div>
    </body>
</html>
@endsection
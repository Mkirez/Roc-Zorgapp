@extends('layouts.app')
@section('content')

<div class="container " style="padding: 80px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
            Hier komt de naam van de student: {{-- {{$studentgegevens->Name}} --}}
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col-md-12">
            <div class="card-body">
            Loopt stage bij: {{-- {{$studentgegevens->stagebedrijf} --}}
            </div>
        </div>            
    </div>
    <br>
    <ul class="list-group">
        <a href=""><li class="list-group-item"aria-current="true">Hier komen de werk bestanden</li></a>
        <a href=""><li class="list-group-item"aria-current="true">Hier komen de werk bestanden</li></a>
        <a href=""><li class="list-group-item"aria-current="true">Hier komen de werk bestanden</li></a>
        <a href=""><li class="list-group-item"aria-current="true">Hier komen de werk bestanden</li></a>
        <a href=""><li class="list-group-item"aria-current="true">Hier komen de werk bestanden</li></a>
    </ul>
    <br>
    <h5>Werkprocessen</h5>
        <div class="list-group list-group-horizontal-md row-cols-12">
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.1
            </label>
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.2
            </label>
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.3
            </label>
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.4
            </label>
        </div>
        <div class="list-group list-group-horizontal-md row-cols-12">
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.1
            </label>
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.2
            </label>
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.3
            </label>
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.4
            </label>
        </div>
        <div class="list-group list-group-horizontal-md row-cols-12">
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.1
            </label>
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.2
            </label>
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.3
            </label>
            <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            1.4
            </label>
        </div>
        <div class="seperator"></div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

</div>
@endsection

@extends('layouts.app')
@section('content')

<div class="container">
  <table class="table table-hover table-dark">
    <thead>
        <tr>
          <th scope="col">Naam</th>
          <th scope="col">Stagebedrijf</th>
          <th scope="col">Gelopen uren</th>
          <th scope="col">Werk process</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($studentgegevens as $studentgegevens)
        <tr>
          <th scope="row">{{$studentgegevens->Name}}</th>
          <th scope="row">{{$studentgegevens->Stagebedrijf}}</th>
          <th scope="row">{{$studentgegevens->Gelopenuren}}</th>
          <th scope="row">{{$studentgegevens->Statusopdrachten}}</th>
          <td><a href="{{url('studentgegevens', $studentgegevens->id)}}" type="button" class="btn btn-sm btn-outline-secondary">View</a></td>
          <td>
            <form method="post"   action="{{url('studentgegevens')}}/{{$studentgegevens->id}}"> @csrf
              @method('DELETE')
              <button type="submit" onclick="delete_message()" class="btn btn-sm btn-outline-secondary">Verwijder</button>                        
            </form>
          </td>
        </tr>
      @endforeach    
    </tbody>
  </table>
</div>

@endsection




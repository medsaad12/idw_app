@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  
<link rel="stylesheet" href="{{asset('css/presence.css')}}">
<div class="pres_jour">
  <h1>Présence de: {{$pres_date->date}}</h1>
  <a href="/presence/{{$pres_date->id}}/edit" class="edit btn btn-primary">Edit</a>
  <table class="table">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($attendaces as $attendace)
        @if ($attendace['presence'] !== "present" && $attendace['presence'] !== "absent")
          <tr>
            <td>{{$attendace["userName"]}}</td>
            <td>{{$attendace["presence"]}} de {{$attendace["hours"]}} heures</td>
          </tr>
        @else
          <tr>
            <td>{{$attendace["userName"]}}</td>
            <td>{{$attendace["presence"]}}</td>
          </tr>
        @endif
      @empty
      No Presence marked
      @endforelse
    </tbody>
  </table>
</div>
@endsection
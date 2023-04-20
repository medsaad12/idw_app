@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/users.css')}}">
<div class="users">
    <h1>Liste des entretiens</h1>
    <div class="crud_table">
      <a href="/entretiens/create"><input type="button" class="add crud_btn" value="Ajouter"></a>
      <form action="/entretiens/search">@csrf<input type="date" name="date"><input type="submit" value="Search"></form>
      <table class="tab table" >
        <thead>
          <tr>
            <th>Nom</th>
            <th>Telephone</th>
            <th>Date</th>
            <th>Heure</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($entretiens as $entretien)
            <tr>
            <td>{{$entretien->nom}}</td>
            <td>{{$entretien->telephone}}</td>
            <td>{{$entretien->date}}</td>
            <td>{{$entretien->heure}}</td>
            <td><a href="/entretiens/{{$entretien->id}}/edit"><input type="button" class="mod crud_btn" value="Modifier"></a></td>
            <td><form method="post" action="/entretiens/{{$entretien->id}}">@csrf @method('delete')<input type="submit" class="del crud_btn" value="Supprimer"></form></td>
            </tr>
          @empty
          @endforelse     
        </tbody>
      </table>
    </div> 
  </div>
@endsection
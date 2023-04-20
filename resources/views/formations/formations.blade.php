@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/users.css')}}">
<div class="users">
    <h1>Liste des formations</h1>
    <div class="crud_table">
      <a href="/formations/create"><input type="button" class="add crud_btn" value="Ajouter"></a>
      <table class="tab table" >
        <thead>
          <tr>
            <th>Nom</th>
            <th>Telephone</th>
            <th>Etat</th>
            <th>Objectif</th>
            <th>Date d'entré</th>
            <th>Date de sortie</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($formations as $formation)
            <tr>
            <td>{{$formation->nom}}</td>
            <td>{{$formation->telephone}}</td>
            <td>{{$formation->status}}</td>
            <td> @if ($formation->objectifs !== null )
              {{$formation->objectifs > 1 ? $formation->objectifs." Objectifs" :  $formation->objectifs." Objectif" }}
            @endif</td>
            <td>{{$formation->date_entre}}</td>
            <td>{{$formation->date_sortie}}</td>
            <td><a href="/formations/{{$formation->id}}/edit"><input type="button" class="mod crud_btn" value="Modifier"></a></td>
            <td><form method="post" action="/formations/{{$formation->id}}">@csrf @method('delete')<input type="submit" class="del crud_btn" value="Supprimer"></form></td>
            </tr>
          @empty
          @endforelse     
        </tbody>
      </table>
    </div> 
  </div>
@endsection
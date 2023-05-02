@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/users.css')}}">
<div class="users">
    <h1>Liste des equipes</h1>
    <div class="crud_table">
      <a href="/equipes/create"><input type="button" class="add crud_btn" value="Ajouter"></a>
      <table class="tab table" >
        <thead>
          <tr>
            <th>Nom</th>
            <th>Chef</th>
            <th>Agents</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($equipes as $equipe)
            <tr>
            <td>{{$equipe->name}}</td>
            <td>{{$equipe->chef}}</td>
            <td>@foreach (json_decode($equipe->agents) as $item)
            {{App\Models\User::find($item)->name ;}}
            @endforeach</td>
            <td><a href="/equipes/{{$equipe->id}}/edit"><input type="button" class="mod crud_btn" value="Modifier"></a></td>
            <td><form method="post" action="/equipes/{{$equipe->id}}">@csrf @method('delete')<input type="submit" class="del crud_btn" value="Supprimer"></form></td>
            </tr>
          @empty
          @endforelse     
        </tbody>
      </table>
    </div> 
  </div>
@endsection

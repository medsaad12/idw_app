@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/users.css')}}">
<div class="users">
    <h1>Liste des Utilisateurs</h1>
    <div class="crud_table">
      <a href="/users/create"><input type="button" class="add crud_btn" value="Ajouter"></a>
      <table class="tab table" >
        <thead>
          <tr>
            <th>Nom et Prénom</th>
            <th>Email</th>
            <th>Role Ou Permissions</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $user)
          @if (!$user->getRoleNames()->contains("ADMIN"))
            <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{count($user->getRoleNames()) > 0 ? $user->getRoleNames() : $user->getPermissionNames() }}</td>
            <td><a href="/users/{{$user->id}}/edit"><input type="button" class="mod crud_btn" value="Modifier"></a></td>
            <td><form method="post" action="/users/{{$user->id}}">@csrf @method('delete')<input type="submit" class="del crud_btn" value="Supprimer"></form></td>
          </tr> 
          @endif
          @empty
              No User Yet
          @endforelse     
        </tbody>
      </table>
    </div> 
  </div>
@endsection
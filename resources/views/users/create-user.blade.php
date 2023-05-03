@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('css/create-users.css')}}">
<div class="create_user">
    <div style="display:flex;">
      <h1>Créer un utilisateur</h1>
    </div>
    <form action="/users" method="post" class="inps">
      @csrf
      <div class="form_one">
        <input type="text" placeholder="Nom et Prénom" name="name">
      </div>
      <div class="form_two">
        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">
      </div>
      @if (session('err'))
        <div class="alert alert-danger text-center">
          {{strtoupper(session('err'))}}
        </div>
      @endif
      <p>Vous pouvez donner à l'utilisateur un rôle ou des permissions , pas les deux !!!!</p>
      <div class="form_three">
        <div class="roles"> 
          <h3>Rôles</h3>
          <div class="rolees">
            @foreach ($roles as $role)
                <div class="role">
                <input type="radio" name="role" value="{{$role->id}}" onclick=toggle_perms()>
                <span>{{$role->name}}</span>
            </div>
            @endforeach
          </div>
          <input type="button" value="Clear" class="clear" onclick=clear_selection()>
        </div>
        <div class="perms">
          <h3>Permissions</h3>
          <div class="permissions">
            @foreach ($permissions as $permission)
                <div class="perm">
                <input type="checkbox" name="permissions[]" value="{{$permission->name}}" onclick=toggle_roles()>
                <span>{{$permission->name}}</span>
            </div>
            @endforeach
            <input type="button" value="Clear" class="clear" onclick=clear_checkbox()>
          </div>
        </div>
      </div>
      <input type="submit" class="create" value="Créer">
    </form>
    <script>
      var alertList = document.querySelectorAll('.alert');
      alertList.forEach(function (alert) {
        new bootstrap.Alert(alert)
      })
    </script>
    
  </div>
  <script src="{{asset('js/users-forms.js')}}"></script>
@endsection
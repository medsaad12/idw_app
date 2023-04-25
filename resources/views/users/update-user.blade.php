@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('css/create-users.css')}}">
<div class="create_user">
    <h1>Modifier un utilisateur</h1>
    <form action="/users/{{$user->id}}" method="post" class="inps">
      @csrf
      @method('put')
      <div class="form_one">
        <input type="text" value="{{$user->name}}" placeholder="Nom et Prénom" name="name">
      </div>
      <div class="form_two">
        <input type="email" value="{{$user->email}}" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">
      </div>
      <p>Vous pouvez donner à l'utilisateur un rôle ou des permissions , pas les deux !!!!</p>
      <div class="form_three">
        <div class="roles"> 
          <h3>Rôles</h3>
          <div class="rolees">
            @foreach ($roles as $role)
                <div class="role">
                <input type="radio" @if($user->haveRole($role->name)) checked @endif name="role" value="{{$role->id}}" onclick=toggle_perms()>
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
                <input type="checkbox"  @if($user->havePermission($permission->name)) checked @endif  name="permissions[]" value="{{$permission->name}}" onclick=toggle_roles()>
                <span>{{$permission->name}}</span>
            </div>
            @endforeach
          </div>
          <input type="button" value="Clear" class="clear" onclick=clear_checkbox()>
        </div>
        
      </div>
      <input type="submit" class="create" value="Save">
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
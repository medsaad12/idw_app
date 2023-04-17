@extends('layouts.sidebar')
@section('content')
  <div class="create_user">
    <h1>Créer un utilisateur</h1>
    <form action="/create_user" method="POST" class="inps">
      <div class="form_one">
        <input type="text" name="fname" placeholder="Prénom">
        <input type="text" name="lname" placeholder="Nom">
      </div>
      <div class="form_two">
        <input type="email" name="email" placeholder="Email">
      </div>
      <div class="form_three">
        <div class="roles"> 
          <h3>Rôles</h3>
          <div class="rolees">
            <div class="role">
              <input type="radio" name="role" value="agent" onclick=toggle_perms()>
              <span>Agent</span>
            </div>
            <div class="role">
              <input type="radio" name="role" value="rh" onclick=toggle_perms()>
              <span>RH</span>
            </div>
            <div class="role">
              <input type="radio" name="role" value="ce" onclick=toggle_perms()>
              <span>Chef d'équipe</span>
            </div>
          </div>
          <input type="button" value="Clear" class="clear" onclick=clear_selection()>
        </div>
        <div class="perms">
          <h3>Permissions</h3>
          <div class="permissions">
            <div class="perm">
              <input type="checkbox" name="perm" value="Perm1" onclick=toggle_roles()>
              <span>Perm1</span>
            </div>
            <div class="perm">
              <input type="checkbox" name="perm" value="Perm2" onclick=toggle_roles()>
              <span>Perm2</span>
            </div>
            <div class="perm">
              <input type="checkbox" name="perm" value="Perm3" onclick=toggle_roles()>
              <span>Perm3</span>
            </div>
            <div class="perm">
              <input type="checkbox" name="perm" value="Perm4" onclick=toggle_roles()>
              <span>Perm4</span>
            </div>
          </div>
        </div>
      </div>
      <input type="submit" class="create" value="Créer">
    </form>
  </div>
@endsection
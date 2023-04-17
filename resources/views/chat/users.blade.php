@extends('layouts.sidebar')
@section('content')
  <div class="users">
    <h1>Liste des Utilisateurs</h1>
    <div class="crud_table">
      <a href="{{ url('create') }}"><input type="button" class="add crud_btn" value="Ajouter"></a>
      <table class="tab table" >
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Fonction</th>
            <th>Dernière connexion</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Regragui</td>
            <td>Sifeddine</td>
            <td>sifeddine.regragui@gmail.com</td>
            <td>Agent</td>
            <td>13/04/2003 12:00 AM</td>
            <td><a href=""><input type="button" class="mod crud_btn" value="Modifier"></a></td>
            <td><a href=""><input type="button" class="del crud_btn" value="Supprimer"></a></td>
          </tr>      
        </tbody>
      </table>
    </div> 
  </div>
@endsection

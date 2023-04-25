@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('css/create-users.css')}}">
<div class="create_user">
  <div style="display:flex;">
    <h1>Nouveau entretien</h1>
  </div>
  <form action="/entretiens/{{$entretien->id}}" method="post" class="inps mb-0">
    @csrf
    @method('put')
    <div class="form_one">
      <input type="text" value="{{$entretien->nom}}" placeholder="Nom" name="nom">
      <input type="text" value="{{$entretien->telephone}}" placeholder="Numero de telephone" name="telephone">
    </div>
    <div class="form_two">
      <input type="datetime-local" value="{{$entretien->heure}}" name="datetime">
    </div>
    <input type="submit" style="margin-top: 15px" class="create" value="Save">
  </form>
  @if (session('err'))
  <div class="alert alert-danger mt-0" role="alert">
    <h4 class="alert-heading">Quelque chose est incorrect ressayez !</h4>
  </div>
  @endif
  @if (session('success'))
  <div class="alert alert-danger mt-0" role="alert">
    <h4 class="alert-heading">Entretient Créé avec succès</h4>
  </div>
  @endif
</div>
<script>
      var alertList = document.querySelectorAll('.alert');
      alertList.forEach(function (alert) {
        new bootstrap.Alert(alert)
      })
    </script>
  <script src="{{asset('js/users-forms.js')}}"></script>
@endsection
@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('css/create-users.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div class="create_user">
    <div style="display:flex;">
      <h1>Nouveau entretien</h1>
    </div>
    <form action="/formations" method="post" class="inps mb-0">
      @csrf
      <div class="form_one">
        <input type="text" placeholder="Nom" name="nom">
        <input type="text" placeholder="Numero de telephone" name="telephone">
      </div>
      <div class="form_two">
       <div style="width: 100% ; display:flex ; flex-direction:column ;align-items:center; justify-content:center">
        <label for="">Date d'entré</label><br>
        <input type="date" placeholder="Date d'entré" name="date_entre">
       </div>
        <div style="width: 100% ; display:flex ; flex-direction:column ;align-items:center; justify-content:center">
          <label for="">Date de sortie</label><br>
        <input type="date" placeholder="Date de sortie" name="date_sortie">
        </div>
      </div>
      <input type="submit" style="margin-top: 15px" class="create" value="Créer">
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
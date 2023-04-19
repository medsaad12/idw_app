@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/create-form.css') }}">
  <script src="{{ asset('js/create-form.js') }}"></script>
  <div class="create_form">
    <h1>Créer un formulaire</h1>
    <form class="form_head" action="/forms" method="POST">
      @csrf
      <input type="text" class="form_name" placeholder="Nom du formulaire:">
      <input type="button" class="add_qst" value="Ajouter question" onclick=add_question()>
      <input type="button" class="add_qst" value="Créer" onclick=submitForm()>
      <input type="hidden" id="data" name="data" value="">
    </form>
    @if (session('err'))
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">quelque chose est incorrect ressayez !
      </h4>
    </div>
    @endif
    @if (session('succes'))
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Formulaire créé avec succès</h4>
    </div>
    @endif
  </div>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
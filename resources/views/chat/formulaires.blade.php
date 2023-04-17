@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/formulaires.css') }}">
  <script src="{{ asset('js/formulaires.js') }}"></script>
  <div class="create_form">
    <h1>Créer un formulaire</h1>
    <div class="form_head">
      <input type="text" class="form_name" placeholder="Nom du formulaire:">
      <input type="button" class="add_qst" value="Ajouter question" onclick=add_question()>
      <input type="button" class="add_qst" value="Envoyer" onclick=submit()>
    </div>
  </div>
@endsection
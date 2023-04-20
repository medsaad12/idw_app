@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/liste_form.css') }}">
  <div class="list_form">
    <h1>Liste Des formulaires remplis </h1>
    <div class="forms">
      @forelse ($forms as $form)
      <a href="/forms/submissions/{{$form->id}}" class="form">
        <h4>{{$form->name}}</h4>
        <small>Soumissions : {{count($form->formSubmissions)}}</small>
      </a>
      @empty
          No form yet
      @endforelse
    </div>
  </div>
@endsection
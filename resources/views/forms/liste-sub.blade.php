@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/create-form.css') }}">
  <script src="{{ asset('js/create-form.js') }}"></script>
  <div>
    <h1>Liste Des formulaires remplis </h1>
    @forelse ($forms as $form)
    Formulaire : <a href="/forms/{{$form->id}}">{{$form->name}}</a> 
    Soumissions : @foreach ($form->formSubmissions as $submission)
        <a href="/forms/submissions/{{$submission->id}}">{{$submission->id}}</a> /
    @endforeach
    <br>
    @empty
        No form yet
    @endforelse
  </div>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
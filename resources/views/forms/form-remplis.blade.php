@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/create-form.css') }}">
  <script src="{{ asset('js/create-form.js') }}"></script>
  <div>
    <h3>Formulaire : {{$form->name}} </h3> 
    <p>Formulaire remplis par l'agent : {{$agent->name}}</p>
    @foreach ($allData as $data)
    {{$data->label}} : {{$data->reponse}} <br>
    @endforeach
  </div>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/create-form.css') }}">
  <script src="{{ asset('js/create-form.js') }}"></script>
  <div>
    <h1>{{$form->name}}</h1>
    <form action="/forms/submit" method="POST">
    @csrf
    @forelse ($fields as $field)
    <label for="{{$field->label}}">{{$field->label}}</label>
    <input type="text" name="{{$field->label}}"> <br>
    @empty
        No form yet
    @endforelse
    <input type="submit">
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
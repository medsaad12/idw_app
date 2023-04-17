@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/formulaire.css') }}">
  <script src="{{ asset('js/create-form.js') }}"></script>
  <form class="formulaire">
    <h1>{{$form->name}}</h1>
    <form action="/forms/submit" method="POST">
    @csrf
    @forelse ($fields as $field)
    <div class="question">
      <h3 class="question_label">-->{{$field->label}}</h3>
      @if ($field->options == null)
        <input type={{$field->type}} class="text_input" required>
      @else
        @foreach (json_decode($field->options) as $option)
          <div class="options">
            <input type={{$field->type}} name={{$field->label}} id={{$field->label}} required>
            <label for={{$field->label}}>{{$option}}</label>
          </div>
        @endforeach
      @endif
    </div>
    @empty
      no form yet
    @endforelse
    <input type="submit" class="form_submit" value="Envoyer">
  </form>
@endsection
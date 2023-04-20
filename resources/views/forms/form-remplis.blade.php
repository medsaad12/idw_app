@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/create-form.css') }}">
  <link rel="stylesheet" href="{{ asset('css/formulaire.css') }}">
  <script src="{{ asset('js/create-form.js') }}"></script>
    <div class="formulaire">
      <h3>Formulaire : {{$form->name}}</h3> 
      <div class="navigation">
        {{$submissions->links('vendor.pagination.simple-default')}}
      </div>
      <div class="formulaire">
        @foreach ($submissions as $sub)
          <p>Formulaire remplis par l'agent : <b>{{App\Models\User::find($sub->agent_id)->name}}</b></p>
          @foreach (json_decode($sub->data) as $rep)
          <div class="question">
            <h3 class="question_label">{{$rep->label}}</h3>
            <span>{{$rep->reponse}}</span>
          </div>
          @endforeach
        @endforeach
      </div> 
    </div>
@endsection
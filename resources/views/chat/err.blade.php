@extends('layouts.sidebar') 
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/chat.css')}}">
<div class="messages"  id="{{Auth::user()->id}}">
    <div id="no-msg" style="height:100%;display:flex;flex-direction:column;justify-content:center;align-items:center">
      <img height="300px" width="300px" src="{{asset('images/no-spam.png')}}" alt="">
      Vous n'appartenez à aucun groupe !
    </div>
  </div>
@endsection
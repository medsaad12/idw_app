@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('css/create-users.css')}}">
<div class="create_user">
    <div style="display:flex;">
      <h1>Modifier le férié: {{$jour->Ferier}}</h1>
    </div>
    <form action="/calendrier/modify/{{$jour->id}}" method="post" class="inps mb-0">
      @csrf
      @method('post')
      <div class="form_one">
        <input type="text" placeholder="Nom du jour férié" name="jourf" value="{{$jour->Ferier}}" required>
        <input type="date" placeholder="Date" name="date" value={{$jour->Date}} required>
        <input type="hidden" name="mod" value="hehe">
      </div>
      <input type="submit" style="margin-top: 15px" class="create" value="Mofifier">
    </form>
    @if (session('err'))
    <div class="alert alert-danger mt-0" role="alert">
      <h4 class="alert-heading">Quelque chose est incorrect ressayez !</h4>
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-danger mt-0" role="alert">
      <h4 class="alert-heading">Jour férié ajouté avec succès</h4>
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
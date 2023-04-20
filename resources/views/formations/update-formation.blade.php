@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('css/create-users.css')}}">
<script src="{{asset('js/update-formation.js')}}"></script>
<div class="create_user">
  <div style="display:flex;">
    <h1>Modifier formation</h1>
  </div>
  <form action="/formations/{{$formation->id}}" method="post" class="inps mb-0">
    @csrf
    @method('put')
    <div class="form_one">
      <input type="text" value="{{$formation->nom}}" placeholder="Nom" name="nom">
      <input type="text" value="{{$formation->telephone}}" placeholder="Numero de telephone" name="telephone">
    </div>
    <div class="form_two">
      <input type="number" placeholder="Objectifs" value="{{$formation->objectifs}}" name="objectifs">
        <div class="roles" id="roles">
        <h3>Etat</h3>
          <div class="rolees" >
          <div class="role">
          <input type="radio" @if($formation->status == "Validé")checked @endif  name="etat" value="Validé">
          <span>Validé</span>
          </div>
          <div class="role">
            <input type="radio" @if($formation->status == "Non Validé")checked @endif name="etat" value="Non Validé">
            <span>Non Validé</span>
          </div>
          <div class="role">
            <input type="radio" @if($formation->status == "Agent")checked @endif name="etat" value="Agent">
            <span>Agent</span>
          </div>
          <input type="button" value="Autre Chose" class="clear" onclick=autreChose()>
        </div>
      </div>
    </div>
    <div style="margin-top: 50px" class="form_two">
      <div style="width: 100% ; display:flex ; flex-direction:column ;align-items:center; justify-content:center">
       <label for="">Date d'entré</label><br>
       <input type="date" placeholder="Date d'entré" value="{{$formation->date_entre}}" name="date_entre">
      </div>
       <div style="width: 100% ; display:flex ; flex-direction:column ;align-items:center; justify-content:center">
         <label for="">Date de sortie</label><br>
       <input type="date" placeholder="Date de sortie" value="{{$formation->date_sortie}}"  name="date_sortie">
       </div>
     </div>
    
    <input type="submit" style="margin-top: 45px" class="create" value="Save">
  </form>
  @if (session('err'))
  <div class="alert alert-danger mt-0" role="alert">
    <h4 class="alert-heading">Quelque chose est incorrect ressayez !</h4>
  </div>
  @endif
  @if (session('success'))
  <div class="alert alert-danger mt-0" role="alert">
    <h4 class="alert-heading">formationt Créé avec succès</h4>
  </div>
  @endif
</div>
@endsection
@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/users.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/production.css')}}">
<div class="users">
    <h1>Production</h1>
    <form action="/production" method="get">
        @csrf
        <div  class="periode row">
          <div class="col-md-2">
          <button class="btn btn-light" type="button" onclick="jourDiv()">Par Jour</button>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="label mb-1" for="de">De</label>
              <input type="date" class="form-control" name="de" id="de" placeholder="De">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="label mb-1" for="a">À</label>
              <input type="date" class="form-control" name="a" id="a" placeholder="À">
            </div>
          </div>
          <div  class="col-md-2 mt-4">
            <button style="margin-top: 4px" type="submit" class="btn  btn-primary">Rechercher</button>
          </div>
        </div>


        <div class="jour row">
          <div class="col-md-3">
          <button class="btn btn-light" type="button" onclick="periode()" >Par Période</button>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="label mb-1" for="a">Jour</label>
              <input type="date" class="form-control" name="jour" id="jour" placeholder="À">
            </div>
          </div>
          <div  class="col-md-3 mt-4">
            <button style="margin-top: 4px" type="submit" class="btn  btn-primary">Rechercher</button>
          </div>
        </div>
      </form>

      <form class="refresh" action="/production" method="get">
        @csrf
        <button class="btn btn-dark mb-1 mr-1" type="submit">Tous les rendez vous</button>
      </form>
    
    <div class="crud_table">
      <table class="tab table table-striped table-bordred table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Agent</th>
            <th>Rdv brut</th>
            <th>Rdv confirme telephone</th>
            <th>Rdv ouverture de porte</th>
            <th>Rdv annuler</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($productions as $production)
            <tr>
            <td>{{$production["agent"]}}</td>
            <td>{{$production["Rdv_brut"]}}</td>
            <td>{{$production["Rdv_confirme_telephone"]}}</td>
            <td>{{$production["Rdv_ouverture_de_porte"]}}</td>
            <td>{{$production["Rdv_annuler"]}}</td>
         
          </tr> 
          @empty
              No Production Yet
          @endforelse     
        </tbody>
      </table>
    </div> 
  </div>
  <script src="{{asset("js/production.js")}}"></script>
@endsection
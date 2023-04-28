@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <div class="container">
    <h2 class="text-center mt-3">Tableau de presence</h2>
    @if (session('err'))
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">quelque chose est incorrect ressayez !</h4>
    </div>
    @endif
    @if (session('succes'))
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Tableau de presence créé avec succès</h4>
    </div>
    @endif
    <form id="presence-form" action="/tableaux/update/{{$tableau->id}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="date-input">Date:</label>
        <input type="date" class="form-control" value="{{$tableau->date}}" id="date-input" name="date">
      </div>
      <input type="hidden" name="equipe_id" value="{{$equipe->id}}">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Agent</th>
            <th>Rdv Brut</th>
            <th>Rdv Confirme Telephone</th>
            <th>Rdv Ouverture de porte</th>
            <th>Rdv annuler</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($rows as $row)
          <tr>
            <td>{{App\Models\User::find($row->agent)->name}}</td>
            <td><input type="number" value="{{$row->Rdv_brut}}" name="{{$row->agent}}-Rdv_brut" ></td>
            <td><input type="number" value="{{$row->Rdv_confirme_telephone}}" name="{{$row->agent}}-Rdv_confirme_telephone"></td>
            <td><input type="number" value="{{$row->Rdv_ouverture_de_porte}}" name="{{$row->agent}}-Rdv_ouverture_de_porte" ></td>
            <td><input type="number" value="{{$row->Rdv_annuler}}" name="{{$row->agent}}-Rdv_annuler"></td>
          </tr>
          @empty
            No User Yet
          @endforelse
        </tbody>
      </table>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
  <script src="{{asset('js/create-tableau.js')}}"></script>
@endsection
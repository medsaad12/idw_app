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
    <form id="presence-form" action="/presence" method="POST">
      @csrf
      <div class="form-group">
        <label for="date-input">Date:</label>
        <input type="date" class="form-control" id="date-input" name="date">
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Present</th>
            <th>Absent</th>
            <th>En retard</th>
            <th>Décharge</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $user)
          @if ($user->name !== "admin")
             <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td><input type="radio" name="{{$user->id}}-presence[]" value="present"></td>
            <td><input type="radio" name="{{$user->id}}-presence[]" value="absent"></td>
            <td><input type="radio" name="{{$user->id}}-presence[]" value="en-retard">
              <input style="width:60px" name="{{$user->id}}-retard" type="number"></td>
            <td><input type="radio" name="{{$user->id}}-presence[]" value="décharge">
              <input style="width:60px" name="{{$user->id}}-decharge" type="number"></td>
          </tr> 
          @endif
          
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
@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/tableau_pres.css')}}">

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
    <form id="presence-form" action="/presence/{{$presence->id}}" method="POST">
      @csrf
      @method('put')
      <div class="form-group">
        <label for="date-input">Date:</label>
        <input type="date" class="form-control" id="date-input" name="date" value="{{$presence->date}}" disabled>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Absent</th>
            <th>Present</th>
            <th>En retard</th>
            <th>Décharge</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            @for ($i = 0; $i < count($attendaces) ; $i++)
                @if ($attendaces[$i]['userName'] == $user->name && $attendaces[$i]['presence'] == "absent")
                <td><input type="radio" name="{{$user->id}}-presence[]" value="present" onclick=untoggle(this)></td>
                <td><input type="radio" checked name="{{$user->id}}-presence[]" value="absent" onclick=untoggle(this)></td>
                <td><input class="dec_ret" type="radio" name="{{$user->id}}-presence[]" value="en-retard" onclick=toggle(this)>
                <input style="width:60px; display: none;" name="{{$user->id}}-retard" type="number"></td>
                <td><input class="dec_ret" type="radio" name="{{$user->id}}-presence[]" value="décharge" onclick=toggle(this)>
                <input style="width:60px; display: none;" name="{{$user->id}}-decharge" type="number"></td>
                @endif
                @if ($attendaces[$i]['userName'] == $user->name && $attendaces[$i]['presence'] == "present")
                <td><input type="radio" checked name="{{$user->id}}-presence[]" value="present" onclick=untoggle(this)></td>
                <td><input type="radio"  name="{{$user->id}}-presence[]" value="absent" onclick=untoggle(this)></td>
                <td><input class="dec_ret" type="radio" name="{{$user->id}}-presence[]" value="en-retard" onclick=toggle(this)>
                <input style="width:60px; display: none;" name="{{$user->id}}-retard"type="number"></td>
                <td><input class="dec_ret" type="radio" name="{{$user->id}}-presence[]" value="décharge" onclick=toggle(this)>
              <input style="width:60px; display: none;" name="{{$user->id}}-decharge" type="number"></td>
                @endif
                @if ($attendaces[$i]['userName'] == $user->name && $attendaces[$i]['presence'] == "en-retard")
                <td><input type="radio" name="{{$user->id}}-presence[]" value="present" onclick=untoggle(this)></td>
                <td><input type="radio" name="{{$user->id}}-presence[]" value="absent" onclick=untoggle(this)></td>
                <td><input class="dec_ret" type="radio" checked name="{{$user->id}}-presence[]" value="en-retard" onclick=toggle(this)>
                <input style="width:60px; display: none;" value="{{$attendaces[$i]['hours']}}" name="{{$user->id}}-retard" type="number"></td>
                <td><input class="dec_ret" type="radio" name="{{$user->id}}-presence[]" value="décharge" onclick=toggle(this)>
                <input style="width:60px; display: none;"  name="{{$user->id}}-decharge" type="number"></td>
                @endif
                @if ($attendaces[$i]['userName'] == $user->name && $attendaces[$i]['presence'] == "décharge")
                <td><input type="radio" name="{{$user->id}}-presence[]" value="present" onclick=untoggle(this)></td>
                <td><input type="radio" name="{{$user->id}}-presence[]" value="absent" onclick=untoggle(this)></td>
                <td><input class="dec_ret" type="radio"  name="{{$user->id}}-presence[]" value="en-retard" onclick=toggle(this)>
                <input style="width:60px; display: none;" name="{{$user->id}}-retard" type="number"></td>
                <td><input class="dec_ret" type="radio" checked name="{{$user->id}}-presence[]" value="décharge" onclick=toggle(this)>
                <input style="width:60px; display: none;" value="{{$attendaces[$i]['hours']}}" name="{{$user->id}}-decharge" type="number"></td>
                @endif
            @endfor
          </tr>
          @empty
            No User Yet
          @endforelse
        </tbody>
      </table>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
  <script src="{{asset('js/edit-pres.js')}}"></script>
@endsection
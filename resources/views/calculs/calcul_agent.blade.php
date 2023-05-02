@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="{{asset('css/calcul.css')}}">
  <script src="{{asset('js/calcul.js')}}"></script>
  <div class="calc_agent">
    <h1>Agent: {{$user->name}}</h1>
    <form class="month_pick" action="" method="get">
      <select name="date" class="dmonth form-control">
        @foreach (range(1, 12) as $monthNumber)
            @if(isset($month))
              <option value="{{ $monthNumber }}" {{$monthNumber==$month ? 'selected' : '' }}>
                {{ date('F', mktime(0, 0, 0, $monthNumber, 1)) }}
              </option>
            @else  
              <option value="{{ $monthNumber }}" {{ $monthNumber == date('n') ? 'selected' : '' }}>
                {{ date('F', mktime(0, 0, 0, $monthNumber, 1)) }}
              </option>
            @endif
        @endforeach
      </select>
      <input type="number" name="year" class="dyear" min="2021" value="20{{date('y')}}">
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <h2>Absences:</h2>
    <div class="tab">
      <table class="abs table table-bordered">
        <thead>
          <tr>
            <th>Date</th>
            <th>Status</th>
            <th>Délai</th>
            <th>Justificatif</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($absences as $abs)
          <tr>
            @foreach ($abs as $item)
              <td>{{$item}}</td>
            @endforeach
          </tr>
          @empty
          @endforelse
        </tbody>
      </table>
    </div>
    
    <table class="ouverture table table-bordered"><th>Ouverture de portes:</th><td class="over">10</td></table>

    <form class="res" action="save" method="POST">
      @method('post')
      @csrf
      <div class="assuidité">
        <span>Assuidité:</span>
        @if($assuidity) 
          <small>500</small> 
          <input type="number" name="assuidite" hidden value="500">
        @else 
          <small>0</small>
          <input type="number" name="assuidite" hidden value="0">
        @endif
      </div>
      <div class="prime">
        <span>Prime:</span>
        <small></small>
        <input type="number" name="prime" hidden value="">
      </div>
      <div class="salaire">
        <span>Salaire:</span>
        @if ($exists)
          <small>{{$salaire}}</small>
        @else
          <select class="prod form-control" onchange="calc_sal()">
            <option value="prod">Productive</option>
            <option value="unprod">Unproductive</option>
          </select>
          <input type="number" class="input_salaire" onkeyup="calc_sal()">
          <span>=</span>
          <small class="sal"></small>
          <input hidden type="number" name="salaire" value="" class="salf"> 
          <input hidden type="number" value="{{23-$nbrabs}}" class="nbr">
        @endif
      </div>
      <input type="number" hidden name="user_id" value="{{$user->id}}">
      <input class="fmonth" type="date" hidden name="date" value="">
      @if(!$exists)<input type="submit" value="Sauvegarder" class="sub btn btn-primary" onclick="save()">@endif
    </form>
  </div>
@endsection
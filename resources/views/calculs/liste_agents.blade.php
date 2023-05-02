@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="{{asset('css/calcul.css')}}">
  <div class="list_agents">
    <h1>Liste Agents</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Agent</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($agents as $a)
        <tr>
          <td><a href="/calcul/{{$a["id"]}}">{{$a["name"]}}</a></td>
          <td>{{$a["email"]}}</td>
        </tr>
        @empty
          
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
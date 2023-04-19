@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <h1>Liste de presence pour l'utilisateur {{$user["name"]}}</h1>
<table class="table table-bordered">
        <thead>
          <tr>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($attendances as $attendance)
          <tr>
            <td>{{$attendance["date"]}}</td>
            <td>
                @if (array_key_exists('hours', $attendance))
                    {{$attendance["presence"]}} de {{$attendance["hours"]}} heures
                @else
                    {{$attendance["presence"]}}
                @endif
                
            </td>
          </tr>
          @empty
            
          @endforelse
        </tbody>
      </table>
@endsection
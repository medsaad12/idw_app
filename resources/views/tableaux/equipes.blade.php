@extends('layouts.sidebar')
@section('content')
<ul>
    @forelse ($equipes as $equipe)
        <li><a href="/tableaux/{{$equipe->id}}">{{$equipe->name}}</a></li>
    @empty
    Pas encore d'équipe !!
    @endforelse
</ul>
@endsection
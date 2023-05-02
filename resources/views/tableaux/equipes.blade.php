@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="{{ asset('css/liste_form.css') }}">

<div class="list_form">
    <h1 class="text-center">Liste des equipes</h1>
    @forelse ($equipes as $equipe)
    <div class="forms">
       <a href="/tableaux/{{$equipe->id}}" class="form">{{$equipe->name}}</a>
    </div>
    @empty
    Pas encore d'équipe !!
    @endforelse
</div>
@endsection
@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('css/presence.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  

<div class="presence">
	<h1>Listes des tableuax d'equipe <span style="color:gray">{{$equipe->name}}</span></h1>
	<a href="/tableaux/{{$equipe->id}}/create"><button class="mt-2 btn btn-primary">Nouveau tableau</button></a>
	<div class="dates_pres">
		@forelse($tableaux as $item)
		<a class="date" href="/tableau/{{$item->id}}">
			<h4>{{date('d', strtotime($item->date))}}</h4>
			<span>{{date('F y', strtotime($item->date))}}</span>
		</a>
		@empty
		@endforelse
	</div>
</div>
@endsection
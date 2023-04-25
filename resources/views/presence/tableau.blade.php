@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/presence.css')}}">

<div class="presence">
	<h1>Listes de présence</h1>
	<a href="/presence/create"><button class="mt-2 btn btn-primary">Nouveau tableau</button></a>
	<div class="dates_pres">
		@forelse($presence as $item)
		<a class="date" href="/presence/{{$item->id}}">
			<h4>{{date('d', strtotime($item->date))}}</h4>
			<span>{{date('F y', strtotime($item->date))}}</span>
		</a>
		@empty
		@endforelse
	</div>
</div>
@endsection
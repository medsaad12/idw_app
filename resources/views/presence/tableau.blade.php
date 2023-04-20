@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<a href="/presence/create"><button class="mt-2 btn btn-primary">Nouveau tableau</button></a>
 <ul>
    @forelse ($presence as $item)
        <li><a href="/presence/{{$item->id}}">{{$item->date}}</a><a href="/presence/{{$item->id}}/edit"><button class="btn btn-warning">Edit</button></a></li>
    @empty
        No Presence Yet
    @endforelse
    <hr>
    <h4></h4>
    @forelse ($users as $user)
    <a href="/presence/user/{{$user->name}}">{{$user->name}} </a> <br>
    @empty
    No Users Yet
    @endforelse
 </ul>
@endsection
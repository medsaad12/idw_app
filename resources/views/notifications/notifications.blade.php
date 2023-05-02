@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@can('G-notifications')
  <a href="/notifications/create"><button class="btn btn-primary m-2">Nouveau notification</button></a>
@endcan
  <ul>
    @foreach (Auth::user()->notifications as $notification)
        @if ($notification->read_at == null)
        <div class="alert alert-primary m-5" role="alert">
          <h4 class="alert-heading">{{$notification->data[0]}} </h4>
          <form action="/notifications/read" method="post">
            @csrf 
            <input type="hidden" name="id" value="{{$notification->id}}">
            <button type="submit" class="btn btn-primary">Recue</button>
          </form>
        </div>
        @endif
    @endforeach
  </ul>
@endsection
@extends('layouts.sidebar')
@section('content')
@can('G-notifications')
  <a href="/notifications/create"><button>Nouveau notification</button></a>
@endcan
  <ul>
    @foreach (Auth::user()->notifications as $notification)
        @if ($notification->read_at == null)
        <li>{{$notification->data[0]}} 
          <form action="/notifications/read" method="post">
            @csrf 
            <input type="hidden" name="id" value="{{$notification->id}}">
            <input type="submit" value="Recue">
          </form>
        </li>
        @endif
    @endforeach
    {{-- @can('G-notifications')
       @forelse (App\Models\Notification::all() as $notification)
       <li>{{$notification["data"]}} 
        <form action="/notifications/{{$notification->id}}" method="post">
          @csrf 
          @method('DELETE')
          <input type="submit" value="Supprimer">
        </form>
      </li>
       @empty
           
       @endforelse     
    @endcan --}}
  </ul>
@endsection
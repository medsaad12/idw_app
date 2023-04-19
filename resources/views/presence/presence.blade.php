@extends('layouts.sidebar')
@section('content')
    <ul>
        @forelse ($attendaces as $attendace)
            @if (array_key_exists('hours', $attendace))
            <li>{{$attendace["userName"]}} : {{$attendace["presence"]}} de {{$attendace["hours"]}} heures</li>
            @else
                <li>{{$attendace["userName"]}} : {{$attendace["presence"]}}</li>
            @endif
            
        @empty
        No Presence marked
        @endforelse
    </ul>
@endsection
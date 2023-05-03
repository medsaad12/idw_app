@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('css/chat.css')}}">
  <div class="chat">
    <div class="people">
      @forelse ($users as $user)
      @if ($user->id !== Auth::user()->id)
      <a style="text-decoration: none ; color:black ;" href="/chat/{{$user->id}}">
        <div class="person">
          <img src="{{ asset('svgs/Default_pfp.svg.png') }}">
          <div class="person_content">
            <span>{{strtoupper($user->name)}}</span>
          </div>
        </div>
      </a>
      
      @endif
      @empty
        No User Yet  
      @endforelse
    </div>
  </div>
@endsection
@extends('layouts.sidebar') 
@section('content')
@vite('resources/js/room.js')
<link rel="stylesheet" href="{{asset('css/chat.css')}}">
<div class="chat">
    <div class="people">
      @can('G-groupes')
          <div style="display:flex;justify-content:center"><a href="/groupes/create"><button class="G-groupes">Créer un groupe</button></a></div>
          <hr>
      @endcan
      @forelse ($groupes as $groupe)
      <a style="text-decoration: none ; color:black ;" href="/groupes/{{$groupe->id}}">
        <div class="person">
          <img src="{{ asset('svgs/Default_pfp.svg.png') }}">
          <div class="person_content">
            <span>{{strtoupper($groupe->group_name)}}</span>
          </div>
        </div>
      </a>
      @empty
        No Group Yet  
      @endforelse
    </div>
    <div class="convo">
      <div class="convo_person">
        <img src="{{ asset('svgs/Default_pfp.svg.png') }}">
        <span style="font-weight: bold">{{strtoupper($group->group_name)}}</span>
      </div>
      <div class="messages">
        <div id="no-msg" style="height:100%;display:flex;flex-direction:column;justify-content:center;align-items:center">
          <img height="300px" width="300px" src="{{asset('images/no-spam.png')}}" alt="">
          No Messages Yet
        </div>
        </div>
      <form class="msg_input" action="/sendtogroup" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" class="message" name="message">
        <input type="hidden" name="receivers_group" id="groupId" value="{{$group->id}}">
        <input type="hidden" name="authId" id="authId" value="{{Auth::user()->id}}">
        <label for="file_input">
          <img src="{{ asset('svgs/paperclip.svg') }}" class="file">
          <input type="file" id="file_input" class="hidden_inps">
        </label>
        <label for="form_submit">
          <img src="{{ asset('svgs/send.svg') }}" class="submit">
          <input type="submit" id="form_submit" class="hidden_inps">
        </label>
      </form>
    </div>
  </div>
  <script>
    var messages = @json($messages);
  </script>
@endsection
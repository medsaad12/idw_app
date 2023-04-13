@extends('layouts.sidebar')
@section('content')
@vite('resources/js/app.js')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
      <hr>
      @endif
      @empty
        No User Yet  
      @endforelse
    </div>
    <div class="convo">
      <div  class="convo_person">
        <img  src="{{ asset('svgs/Default_pfp.svg.png') }}">
        <span style="font-weight: bold">{{strtoupper($receiver->name)}}</span>
      </div>
      <div class="messages"  id="{{Auth::user()->id}}">
        <div id="no-msg" style="height:100%;display:flex;flex-direction:column;justify-content:center;align-items:center">
          <img height="300px" width="300px" src="{{asset('images/no-spam.png')}}" alt="">
          No Messages Yet
        </div>
      </div>
      @if (session('err'))
                  <div class="alert alert-danger text-center">
                    {{strtoupper(session('err'))}}
                   </div>
      @endif
      <form class="msg_input" action="/send" method="POST" enctype="multipart/form-data">
        @csrf 
        <input type="text" value="" name="message" id="message" class="message">
        <input type="hidden" name="receiver" id="receiver" value="{{$receiver->id}}">
        <input type="hidden" name="userId" id="userId" value="{{Auth::user()->id}}">
        <label for="file_input">
          <img src="{{ asset('svgs/paperclip.svg') }}" class="file">
          <input type="file" name="file" id="file_input" class="hidden_inps">
        </label>
        <label for="form_submit">
          <img src="{{ asset('svgs/send.svg') }}"  class="submit">
          <input type="submit" id="form_submit"  class="hidden_inps">
        </label>
      </form>
    </div>
  </div>
  <script>
    var messages = @json($messages);
  </script>
@endsection
@extends('layouts.sidebar')
@section('content')
@vite('resources/js/app.js')

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
      <form class="msg_input" action="/send" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" value="" name="message" id="message" class="message">
        <input type="hidden" name="receiver" id="receiver" value="{{$receiver->id}}">
        <input type="hidden" name="userId" id="userId" value="{{Auth::user()->id}}">
        <label for="file_input">
          <img src="{{ asset('svgs/paperclip.svg') }}" class="file">
          <input type="file" name="document_path" id="file_input" class="hidden_inps">
        </label>
        @if (session('err'))
                  <div class="alert alert-danger text-center">
                    {{strtoupper(session('err'))}}
                   </div>
              @endif
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
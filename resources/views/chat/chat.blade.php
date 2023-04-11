@extends('layouts.sidebar')
@section('content')
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
        <label for="form_submit">
          <img src="{{ asset('svgs/send.svg') }}"  class="submit">
          <input type="submit" id="form_submit"  class="hidden_inps">
        </label>
      </form>
    </div>
  </div>
  <style>
    .msg_input{
      display: flex;
      align-items: center;
      height: 5%;
      margin: 10px;
    }

    .convo_person{
      border-bottom: 2px solid black;
    }

    .person, .convo_person{
      height: 12%;
      /* background-color: beige; */  
      display: flex;
      align-items: center;
    }

    label img{
      width: 30px !important;
      transform: rotate(40deg);
      cursor: pointer;
      font-size: medium;
    }

    .message{
      width: 90%;
      height: 100%;
      padding: 3px;
      border: 2px solid black;
      border-radius: 5px;
    }

    .hidden_inps{
      display: none;
    }

    .convo_person img{
      width: 7% !important;
    }

    .person:hover{
      background-color: lightgray;
    }

    .msg_sent{
      color: white;
      background-color: #564aff;
      /* min-height: 10%; */
      max-width: 60%;
      padding: 10px;
      margin-left: auto;      
      border-radius: 5px 5px 0px 5px;
      margin-top: 15px;
    }
    
    .msg_rec{
      padding: 10px;
      border-radius: 5px 5px 5px 0px;
      background-color: grey;
      color: white;
      /* min-height: 20px; */
      max-width: 60%;
      margin-top: 15px;
    }

    .person_content{
      display: flex;
      flex-direction: column;
    }

    .people img, .convo_person img{
      width: 10%;
      margin: 0px 15px 0px 10px !important;
    }

    .messages{
      display: flex;
      flex-direction: column;
      height: 100%;
      max-width: 100%;
      overflow-y: scroll;
      margin: 0px 5px 3px 5px;
    }

    .messages::-webkit-scrollbar{
      width: 3px;
    }

    .messages::-webkit-scrollbar-thumb{
      background-color: black;
    }

    .chat{
      display: flex;
      width: 100%;
      height: 100%;
      /* background-color: bisque; */
    }

    .people{
      /* background-color: aquamarine; */
      width: 23%;
      height: 100%;
      max-width: 100%;
      overflow: scroll;
      border-right: 2px solid black;
    }

    .people::-webkit-scrollbar{
      width: 3px;
    }

    .people::-webkit-scrollbar-thumb{
      background-color: black;
    }

    .convo{
      display: flex;
      flex-direction: column;
      /* background-color: blueviolet; */
      width: 82%;
      height: 100%;
    }
  </style>
  <script>
    var messages = @json($messages);
  </script>
@endsection
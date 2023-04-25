@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
{{-- <style>
  body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
  }
  .container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    min-height: 300px;
    display: flex;
    flex-direction: column;
    height: 500px;
  }
  .chat-box {
    flex: 1;
    margin-bottom: 10px;
    padding: 10px;
    background-color: #f7f7f7;
    border-radius: 5px;
    max-height: 400px;
    /* set the max-height to 600px */
    overflow-y: auto;
    /* add the overflow-y property to enable scrolling */
  }
  .message {
    margin-bottom: 10px;
    padding: 10px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, .1);
    display: inline-block;
    max-width: 80%;
    word-wrap: break-word;
  }
  .message.user {
    background-color: #564aff;
    align-self: flex-end;
    color: white;

  }
  .message.bot {
    background-color: #f7f7f7;
    align-self: flex-start;
  }
  .form-group {
    margin-bottom: 0;
  }
  .input-group {
    margin-bottom: 10px;
  }
  .input-group-prepend,
  .input-group-append {
    cursor: pointer;
  }
  .input-group-text {
    background-color: #fff;
    border: none;
    border-right: 1px solid #dee2e6;
    border-radius: 0;
    padding: 5px 10px;
    font-weight: bold;
    color: #868e96;
  }
  .form-control {
    border-radius: 0;
    border-left: none;
  }

  .form-group select {
    border-left: 2px solid #ccc;
  }
</style>
<div style="display: flex ; width:100% ; height:700px">
  <div style="width: 50%">
    <form action="/getConversation" method="post">
      @csrf
     
      <div class="form-group">
        <label for="user">Select Sender:</label>
        <select style="width: 200px" class=" form-control" id="user" name="sender">
          @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
        </select>
      </div>
      
      <div class="form-group">
        <label for="user">Select Receiver:</label>
        <select style="width: 200px" class=" form-control" id="user" name="receiver">
          @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
        </select>
      </div>
      <button class="mt-2 btn btn-primary" type="submit">Get</button>
    </form>

  </div>
  <div style="width: 50%">
    <div class="container">
      <div class="chat-box">
        @forelse ($messages as $message)
        @if ($message->sender_id == $sender_id)
        <div class="message user">
          <p>{{$message->message}}</p>
        </div><br>
        @else
        <div class="message bot">
          <p>{{$message->message}}</p>
        </div><br>
        @endif
        @empty
        no msg yet
        @endforelse


      </div>

    </div>
  </div>
</div> --}}
@vite('resources/js/app.js')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/chat.css')}}">
  <div class="chat">
    <div class="people">
      <form action="/getConversation" method="post">
        @csrf
        <div class="form-group">
          <label for="user">Select Sender:</label>
          <select style="width: 200px" class=" form-control" id="user" name="sender">
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="user">Select Receiver:</label>
          <select style="width: 200px" class=" form-control" id="user" name="receiver">
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
        <button class="mt-2 btn btn-primary" type="submit">Get</button>
      </form>
    </div>
    <div class="convo">
      <div class="messages" style="margin-bottom: 20px">
        @forelse ($messages as $message)
            @if ($message->sender_id == $sender_id)
            @if ($message->message == null && $message->document_path)
            <span class="msg_sent"><p style="font-size:12px;margin-bottom:5px">{{ basename(str_replace('/documents/', '', $message->document_path)) }}
              :</p><div style="display:flex ; justify-content:center"><a href="/download/{{$message->id}}" style="background-color: #2d23b9 ; color:white ; " class="btn" >Download</a></div></span>
            @endif
            @if ($message->message !== null && $message->document_path)
            <span class="msg_sent"><p>{{ $message->message }}</p><p style="font-size:12px;margin-bottom:5px">{{ basename(str_replace('/documents/', '', $message->document_path)) }}
              :</p><div style="display:flex ; justify-content:center"><a href="/download/{{$message->id}}" style="background-color: #2d23b9 ; color:white ; " class="btn" >Download</a></div></span>
            @endif
            @if ($message->message && $message->document_path == null )
            <span class="msg_sent">{{$message->message}}</span>
            @endif
            @else
            @if ($message->message !== null && $message->document_path )
            <span class="msg_rec"><p>{{ $message->message }}</p><p style="font-size:12px;margin-bottom:5px">{{ basename(str_replace('/documents/', '', $message->document_path)) }}
              :</p><div style="display:flex ; justify-content:center"><a href="/download/{{$message->id}}" style="background-color: gray ; color:white ; " class="btn btn-light" >Download</a></div></span>
            @endif
            @if ($message->message == null && $message->document_path)
            <span class="msg_rec"><p style="font-size:12px;margin-bottom:5px">{{ basename(str_replace('/documents/', '', $message->document_path)) }}
              :</p><div style="display:flex ; justify-content:center"><a href="/download/{{$message->id}}" style="background-color: gray ; color:white ; " class="btn btn-light" >Download</a></div></span>
            @endif
            @if ($message->message && $message->document_path == null )
            <span class="msg_rec">{{$message->message}}</span>
            @endif
            @endif
        @empty
        <div id="no-msg" style="height:100%;display:flex;flex-direction:column;justify-content:center;align-items:center">
          <img height="300px" width="300px" src="{{asset('images/no-spam.png')}}" alt="">
          No Messages Yet
        </div>
        @endforelse
      </div>
    </div>
  </div>
@endsection
@extends('layouts.sidebar')
@section('content')
  <div class="profile_con">
    <h1>Bienvenue dans IDW App </h1>
    <div class="profile">
      <div class="profile_img">
        <img src="{{ asset('svgs/Default_pfp.svg.png') }}">
      </div>
      <div class="profile_info">
        <h2>{{strtoupper(Auth::user()->name)}}</h2>
        <div class="infos">
          <div class="info_labels">
            <span style="margin-right: 0px">Email:</span>
          </div>
          <div class="info_values">
            <span style="margin-left: 0px">{{Auth::user()->email}}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
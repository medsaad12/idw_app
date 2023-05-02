@extends('layouts.sidebar')
@section('content')
<div class="m-3">
    <form action="/notifications" method="post" class="form-inline">
        @csrf
        <div class="form-group col-md-4">
          <input type="text" name="notification" class="form-control mr-2" placeholder="Enter your notification">
          <button type="submit" class="btn btn-primary m-2">Submit</button>
        </div>
    </form>  
</div>
@endsection
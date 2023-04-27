@extends('layouts.sidebar')
@section('content')
<div class="stats">
  <h1>Statistiques</h1>
  <div class="stat_heads">
    <button onclick=fetch_check()>button</button>
  </div>
</div>

<script>
  function fetch_check(){
    fetch('/stat_test')
      .then(response => response.text())
      .then(data => console.log(data))
  }
</script>
@endsection
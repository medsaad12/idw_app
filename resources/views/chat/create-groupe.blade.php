@extends('layouts.sidebar')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<section class="ftco-section">
    <div class="container">

    <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
    <div class="contact-wrap w-100 p-md-5 p-4">
    <h3 class="mb-4">Créer un groupe</h3>
    <div id="form-message-warning" class="mb-4"></div>
    @if (session('err'))
                  <div class="alert alert-danger text-center">
                    {{strtoupper(session('err'))}}
                   </div>
              @endif
    <form method="POST" action="/groupes" id="contactForm" name="contactForm" class="contactForm">
        @csrf
    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <label class="label mb-1" for="name">Nom du groupe</label>
    <input type="text" class="form-control" name="group_name" id="name" placeholder="Nom du groupe">
    </div>
    <h5 class="mt-2 mb-2">Membre Du groupe :</h5>
    @forelse ($users as $user)
    @if ($user->id !== Auth::user()->id)
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="members[]" value="{{$user->id}}" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          {{$user->name}}
        </label>
        </div>
    @endif
    @empty
        No User Yet !!
    @endforelse
    </div>
    <div class="col-md-12 mt-2">
    <div class="form-group">
    <input type="submit" value="Créer" class="btn btn-primary">
    <div class="submitting"></div>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </section>
@endsection
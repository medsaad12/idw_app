@extends('layouts.sidebar')
@section('content')
  <link rel="stylesheet" href="{{asset('css/users.css')}}">
  <link rel="stylesheet" href="{{asset('css/calendrier.css')}}">

  <div class="jrs_feries">
    <h1>Calendrier des jours férié</h1>
    <a href="/calendrier/ajouter"><input type="button" class="add crud_btn" value="Ajouter"></a>
    <table class="tab table" >
      <thead>
        <tr>
          <th>Nom</th>
          <th>Date</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($liste_f as $item)
          <tr>
            <td>{{$item->Ferier}}</td>
            <td>{{$item->Date}}</td>
            <td>
              <form method="post" action="/calendrier/modify/{{$item->id}}">@csrf @method('post')
                <input type="submit" class="mod crud_btn" value="Modifier">
              </form>
            </td>
            <td>
              <form method="post" action="/calendrier/delete/{{$item->id}}">@csrf @method('post')
                <input type="submit" class="del crud_btn" value="Supprimer">
              </form>
            </td>
          </tr>
        @empty         
          <tr>
            <td>Aucun jour férié n'est ajouté</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        @endforelse     
      </tbody>
    </table>
    
  </div>
@endsection
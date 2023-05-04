<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDW</title>
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="{{ asset('js/clear_radio.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div class="sidebar">
      <div class="sidelinks">
        <a href="{{ url('profile') }}" class="link">
          <img src="{{ asset('svgs/person.svg') }}" class="icons">
          <span>Profile</span>
        </a>
        @if (Auth::user()->hasRole(['ADMIN', 'RH' ,'CE' ,'AGENT']))
        @role('ADMIN')
        <a href="{{ url('chat') }}" class="link">
          <img src="{{ asset('svgs/chat-left-dots.svg') }}" class="icons">
          <span>Chat</span>
        </a>
        <a href="{{ url('groupes') }}" class="link">
          <img src="{{ asset('svgs/people.svg') }}" class="icons">
          <span>Groupes</span>
        </a>
        <a href="{{ url('users') }}" class="link">
          <img src="{{ asset('svgs/table.svg') }}"
            class="icons">
          <span>Utilisateurs</span>
        </a>
        <a href="/forms/create" class="link">
          <img src="{{ asset('svgs/file-earmark-plus.svg') }}" class="icons">
          <span>Créer formulaire</span>
        </a>
        <a href="/forms/sub" class="link">
          <img src="{{ asset('svgs/ui-checks.svg') }}" class="icons">
          <span>Formulaires remplis</span>
        </a>
        <a href="/forms" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Remplir formulaires</span>
        </a>
        <a href="/conversation" class="link">
          <img swidth="20" height="20" src="{{ asset('svgs/chat-svgrepo-com.svg') }}" class="icons">
          <span>Conversations</span>
        </a>
        @endrole
        @role('AGENT')
        <a href="{{ url('chat') }}" class="link">
          <img src="{{ asset('svgs/chat-left-dots.svg') }}" class="icons">
          <span>Chat</span>
        </a>
        <a href="{{ url('groupes') }}" class="link">
          <img src="{{ asset('svgs/people.svg') }}" class="icons">
          <span>Groupes</span>
        </a>
        <a href="/forms" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Remplir formulaires</span>
        </a>
        @endrole
        @role('CE')
        <a href="{{ url('chat') }}" class="link">
          <img src="{{ asset('svgs/chat-left-dots.svg') }}" class="icons">
          <span>Chat</span>
        </a>
        <a href="{{ url('groupes') }}" class="link">
          <img src="{{ asset('svgs/people.svg') }}" class="icons">
          <span>Groupes</span>
        </a>
        <a href="{{ url('codes') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Codes</span>
        </a>
        <a href="/tableaux" class="link">
          <img src="{{ asset('svgs/table.svg') }}" class="icons">
          <span>Tableau des Agents</span>
        </a>
        <a href="/equipes" class="link">
          <img src="{{ asset('svgs/people.svg') }}" class="icons">
          <span>Equipes</span>
        </a>
        <a href="{{ url('rdv') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Tableau des RDV</span>
        </a>
        @endrole
        @role('RH')
        <a href="{{ url('chat') }}" class="link">
          <img src="{{ asset('svgs/chat-left-dots.svg') }}" class="icons">
          <span>Chat</span>
        </a>
        <a href="{{ url('groupes') }}" class="link">
          <img src="{{ asset('svgs/people.svg') }}" class="icons">
          <span>Groupes</span>
        </a>
        <a href="/formations" class="link">
          <img src="{{ asset('svgs/mortarboard.svg') }}" class="icons">
          <span>Gestion de formations</span>
        </a>
        <a href="{{ url('calcul') }}" class="link">
          <img src="{{ asset('svgs/calculator.svg') }}" class="icons">
          <span>Calcule Salaire</span>
        </a>
        <a href="{{ url('stat') }}" class="link">
          <img src="{{ asset('svgs/graph-up.svg') }}" class="icons">
          <span>Statistiques</span>
        </a>
        <a href="/presence" class="link">
          <img src="{{ asset('svgs/person-check.svg') }}" class="icons">
          <span>Tableau de présence</span>
        </a>
        <a href="/entretiens" class="link">
          <img src="{{ asset('svgs/person-workspace.svg') }}" class="icons">
          <span>Gestion des entretiens</span>
        </a>
        </a>
        <a href="{{ url('calendrier') }}" class="link">
          <img src="{{ asset('svgs/calendar.svg') }}" class="icons">
          <span>Calendrier fériés</span>
        </a>
        <a href="{{ url('rdv') }}" class="link">
          <img src="{{ asset('svgs/bell.svg') }}" class="icons">
          <span>Notification</span>
        </a>
        @endrole
        @else
        @can('chat')
        <a href="{{ url('chat') }}" class="link">
          <img src="{{ asset('svgs/chat-left-dots.svg') }}" class="icons">
          <span>Chat</span>
        </a>
        <a href="{{ url('groupes') }}" class="link">
          <img src="{{ asset('svgs/people.svg') }}" class="icons">
          <span>Groupes</span>
        </a>
        @endcan

        @can('G-utilisateurs')
        <a href="{{ url('users') }}" class="link">
          <img src="{{ asset('svgs/management.png') }}"
            class="icons">
          <span>Utilisateurs</span>
        </a>
        @endcan

        @can('G-conversatio')
         <a href="/conversation" class="link">
          <img width="20" height="20" src="{{asset('svgs/chat-svgrepo-com.svg')}}" alt="">
          <span>Conversations</span>
        </a>
        @endcan

        @can('G-formulaires')
        <a href="/forms/create" class="link">
          <img src="{{ asset('svgs/file-earmark-plus.svg') }}" class="icons">
          <span>Créer formulaire</span>
        </a>
        <a href="/forms/sub" class="link">
          <img src="{{ asset('svgs/ui-checks.svg') }}" class="icons">
          <span>Formulaires remplis</span>
        </a>
        @endcan

        @can('remplissage-fromulaire')
        <a href="/forms" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Remplir formulaires</span>
        </a>
        @endcan

        @can('G-présence')
        <a href="/presence" class="link">
          <img src="{{ asset('svgs/person-check.svg') }}" class="icons">
          <span>Tableau de présence</span>
        </a>
        @endcan

        @can('G-entretiens')
        <a href="/entretiens" class="link">
          <img src="{{ asset('svgs/person-workspace.svg') }}" class="icons">
          <span>Gestion des entretiens</span>
        </a>
        @endcan

        @can('G-formations')
        <a href="/formations" class="link">
          <img src="{{ asset('svgs/mortarboard.svg') }}" class="icons">
          <span>Gestion de formations</span>
        </a>
        @endcan

        @can('statistique-agent')
        <a href="{{ url('stat') }}" class="link">
          <img src="{{ asset('svgs/graph-up.svg') }}" class="icons">
          <span>Statistiques</span>
        </a>
        @endcan

        @can('G-codes')
        <a href="{{ url('codes') }}" class="link">
          <img src="{{ asset('svgs/people.svg') }}" class="icons">
          <span>Codes</span>
        </a>
        @endcan

        @can('Tableau-agents')
        <a href="/tableaux" class="link">
          <img src="{{ asset('svgs/table.svg') }}" class="icons">
          <span>Tableau des Agents</span>
        </a>  
        <a href="/equipes" class="link">
          <img height="36" width="38" src="{{ asset('svgs/table.svg') }}" class="icons">
          <span>Equipes</span>
        </a> 
        @endcan

        @can('Tableau-RDV')
        <a href="{{ url('rdv') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Tableau des RDV</span>
        </a>
        @endcan

        @can('notification')
        <a href="{{ url('rdv') }}" class="link">
          <img src="{{ asset('svgs/bell.svg') }}" class="icons">
          <span>Notification</span>
        </a>
        @endcan
        @endif
        <a onclick="logout()" class="link">
          <img src="{{ asset('svgs/box-arrow-left.svg') }}" class="icons">
          <form method="POST" id="logout-form" action="/logout">@csrf</form>
          <span>Logout</span>
        </a>
      </div>
    </div>
    <div class="continer">
      @yield('content')
    </div>
  </body>
  <script>
  function logout(){
    var span = document.getElementById('logout-form').submit();
  }
</script>
</html>
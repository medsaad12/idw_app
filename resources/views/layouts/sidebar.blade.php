<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDW</title>
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.js')


  </head>
  <body>
    <div class="sidebar">
      <div class="sidelinks">
        <a href="{{ url('profile') }}" class="link">
          <img src="{{ asset('svgs/person-fill.svg') }}" class="icons">
          <span>Profile</span>
        </a>
        @if (Auth::user()->hasRole(['ADMIN', 'RH' ,'CE' ,'AGENT']))
        @role('ADMIN')
        <a href="{{ url('chat') }}" class="link">
          <img src="{{ asset('svgs/chat-left-dots-fill.svg') }}" class="icons">
          <span>Chat</span>
        </a>
        <a href="{{ url('groupes') }}" class="link">
          <img src="{{ asset('svgs/people-fill.svg') }}" class="icons">
          <span>Groupes</span>
        </a>
        <a href="{{ url('users') }}" class="link">
          <img width="20" height="38" src="{{ asset('svgs/management.png') }}"
            class="icons">
          <span>Utilisateurs</span>
        </a>
        <a href="{{ url('formulaires') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Formulaires</span>
        </a>
        @endrole
        @role('AGENT')
        <a href="{{ url('chat') }}" class="link">
          <img src="{{ asset('svgs/chat-left-dots-fill.svg') }}" class="icons">
          <span>Chat</span>
        </a>
        <a href="{{ url('groupes') }}" class="link">
          <img src="{{ asset('svgs/people-fill.svg') }}" class="icons">
          <span>Groupes</span>
        </a>
        <a href="{{ url('formulaires') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Creer-Formulaire</span>
        </a>
        @endrole
        @role('CE')
        <a href="{{ url('chat') }}" class="link">
          <img src="{{ asset('svgs/chat-left-dots-fill.svg') }}" class="icons">
          <span>Chat</span>
        </a>
        <a href="{{ url('groupes') }}" class="link">
          <img src="{{ asset('svgs/people-fill.svg') }}" class="icons">
          <span>Groupes</span>
        </a>
        <a href="{{ url('codes') }}" class="link">
          <img src="{{ asset('svgs/people-fill.svg') }}" class="icons">
          <span>Codes</span>
        </a>
        <a href="{{ url('tableauDesAgents') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Tableau des Agents</span>
        </a>
        <a href="{{ url('rdv') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Tableau des RDV</span>
        </a>
        @endrole
        @role('RH')
        <a href="{{ url('chat') }}" class="link">
          <img src="{{ asset('svgs/chat-left-dots-fill.svg') }}" class="icons">
          <span>Chat</span>
        </a>
        <a href="{{ url('groupes') }}" class="link">
          <img src="{{ asset('svgs/people-fill.svg') }}" class="icons">
          <span>Groupes</span>
        </a>
        <a href="{{ url('listeDeFormations') }}" class="link">
          <img src="{{ asset('svgs/people-fill.svg') }}" class="icons">
          <span>Liste De Formations</span>
        </a>
        <a href="{{ url('StatistiqueDesAgent') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Statistique des agent </span>
        </a>
        <a href="{{ url('tableauDePresence') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Tableau de présence</span>
        </a>
        <a href="{{ url('tableauDesEntretiens') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Gestion des entretiens</span>
        </a>
        <a href="{{ url('calculatrice') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Calculatrice</span>
        </a>
        <a href="{{ url('rdv') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Notification</span>
        </a>
        @endrole
        @else
        @can('chat')
        <a href="{{ url('chat') }}" class="link">
          <img src="{{ asset('svgs/chat-left-dots-fill.svg') }}" class="icons">
          <span>Chat</span>
        </a>
        <a href="{{ url('groupes') }}" class="link">
          <img src="{{ asset('svgs/people-fill.svg') }}" class="icons">
          <span>Groupes</span>
        </a>
        @endcan

        @can('G-utilisateurs')
        <a href="{{ url('users') }}" class="link">
          <img width="20" height="38" src="{{ asset('svgs/management.png') }}"
            class="icons">
          <span>Utilisateurs</span>
        </a>
        @endcan

        @can('G-conversations')
        <a href="{{ url('groupes') }}" class="link">
          <img src="{{ asset('svgs/people-fill.svg') }}" class="icons">
          <span>Conversations</span>
        </a>
        @endcan

        @can('G-formulaires')
        <a href="{{ url('formulaires') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Formulaires</span>
        </a>
        @endcan

        @can('creation-de-fromulaire')
        <a href="{{ url('formulaires') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Creer-Formulaire</span>
        </a>
        @endcan

        @can('G-présence')
        <a href="{{ url('tableauDePresence') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Tableau de présence</span>
        </a>
        @endcan

        @can('G-entretiens')
        <a href="{{ url('tableauDesEntretiens') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Gestion des entretiens</span>
        </a>
        @endcan

        @can('G-formations')
        <a href="{{ url('listeDeFormations') }}" class="link">
          <img src="{{ asset('svgs/people-fill.svg') }}" class="icons">
          <span>Liste De Formations</span>
        </a>
        @endcan

        @can('Calcule-salaire')
        <a href="{{ url('calculatrice') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Calculatrice </span>
        </a>
        @endcan

        @can('Calcule-assiduité ')
        <a href="{{ url('calculatrice') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Calculatrice </span>
        </a>
        @endcan

        @can('Calcule-prime')
        <a href="{{ url('calculatrice') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Calculatrice </span>
        </a>
        @endcan

        @can('statistique-agent')
        <a href="{{ url('StatistiqueDesAgent') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Statistique des agent </span>
        </a>
        @endcan

        @can('G-codes')
        <a href="{{ url('codes') }}" class="link">
          <img src="{{ asset('svgs/people-fill.svg') }}" class="icons">
          <span>Codes</span>
        </a>
        @endcan

        @can('Tableau-agents')
        <a href="{{ url('tableauDesAgents') }}" class="link">
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Tableau des Agents</span>
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
          <img src="{{ asset('svgs/pencil-square.svg') }}" class="icons">
          <span>Notification</span>
        </a>
        @endcan
        @endif





        <a onclick="logout()" class="link">
          <img width="30" height="38" src="{{ asset('svgs/logout.png') }}"
            class="icons">
          <form method="POST" id="logout-form" action="/logout">@csrf</form>
          <span>Logout</span>
        </a>
      </div>
    </div>
    <div class="container">
      @yield('content')
    </div>
  </body>
  <script>
  function logout(){
    var span = document.getElementById('logout-form').submit();
  }
</script>
</html>
@extends('layouts.sidebar')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<link rel="stylesheet" href="{{asset('css/calcul.css')}}">
<div class="stats">
  <h1>Statistiques</h1>
  <div class="tab list_agents">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Agent</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($agents as $a)
        <tr>
          <td><a href="/stats/{{$a["id"]}}">{{$a["name"]}}</a></td>
          <td>{{$a["email"]}}</td>
        </tr>
        @empty      
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="absences"></div>
  <div class="ouverture"></div>
</div>
<script>
  window.onload = ()=>{
    let abs = document.querySelector('.absences')
    let ouv = document.querySelector('.ouverture')
    Highcharts.chart(abs, {
      chart: {
        type: 'line',
        zoomType: 'x'
      },
      title: {
        text: 'Absences'
      },
      xAxis: {
        type: 'category',
        categories: @json(array_column($abs,0)),
        labels: {
          rotation: -40,
          style: {
            fontSize: '13px'
          }
        }
      },
      yAxis: {
        min: 0,
        title: {
          text: "nombres d'absences"
        }
      },
      legend: {
        enabled: false
      },
      tooltip: {
        pointFormat: "nombre d'absences   : <b>{point.y}</b>"
      },
      series: [{
        data: @json(array_column($abs,1))
      }],
      scrollbar: {
        enabled: true
      }
    })
    Highcharts.chart(ouv, {
      chart: {
        type: 'line',
        zoomType: 'x'
      },
      title: {
        text: 'Ouvertures de porte'
      },
      xAxis: {
        type: 'category',
        categories: @json(array_column($ouvs,0)),
        labels: {
          rotation: -40,
          style: {
            fontSize: '13px'
          }
        }
      },
      yAxis: {
        min: 0,
        title: {
          text: "nombres d'ouvertures"
        }
      },
      legend: {
        enabled: false
      },
      tooltip: {
        pointFormat: "nombre d'ouverture   : <b>{point.y}</b>"
      },
      series: [{
        data: @json(array_column($ouvs,1))
      }],
      scrollbar: {
        enabled: true
      }
    })
  }
</script>
@endsection
@extends('layouts.sidebar')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<link rel="stylesheet" href="{{asset('css/calcul.css')}}">
<div class="stats">
  <h1>Statistiques d'agent: {{$agent->name}}</h1>
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
        categories: @json(array_column($data,0)),
        labels: {
          rotation: -50,
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
        pointFormat: "nombres d'absences: <b>{point.y}</b>"
      },
      series: [{
        name: 'Absences',
        data: @json(array_column($data,1))
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
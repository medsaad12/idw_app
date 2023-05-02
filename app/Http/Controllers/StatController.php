<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tableau;
use App\Models\Presence;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatController extends Controller{
  public function get_chart_data(){
    /*---------------absences-----------------*/
    $pres_dates = Presence::all('date','id')->sortBy('date');
    $date_count = array();
    foreach($pres_dates as $date){
      $date_count[] = \DB::table('presence_user')
        ->select('presence')
        ->where('presence_id','=',$date->id)
        ->where('presence','=','absent')
        ->count();
    }
    $data1 = array();
    foreach($pres_dates as $key => $date){
      $data1[] = array($date->date, $date_count[$key]);
    }
    /*-----------------ouvertures-----------------*/
    $ouv_dates = Tableau::all('date','id')->sortBy('date');
    $ouv_count = array();
    foreach($ouv_dates as $date){
      $ouv_count[] = \DB::table('tableau_rows')
        ->select(\DB::raw('SUM(Rdv_ouverture_de_porte) as sum'))
        ->where('tableau_id','=',$date->id);
    }
    $data2 = array();
    foreach($ouv_dates as $key => $date){
      $data2[] = array($date->date, intval($ouv_count[$key]->first()->sum));
    }

    $agents = User::all()->filter(function($user){return $user->hasRole('AGENT');});
    return view('/statistiques/stats_all',['abs'=>$data1, 'ouvs'=>$data2, 'agents'=>$agents]);
  }

  public function get_agent_stats(Request $request){
    /*----------------------presence-------------------------*/
    $pres_dates = Presence::all('date','id')->sortBy('date');
    $id = $request->segment(2);
    $date_count = array();
    foreach($pres_dates as $date){
      $date_count[] = \DB::table('presence_user')
        ->select('presence')
        ->where('presence_id','=',$date->id)
        ->where('presence','=','absent')
        ->where('user_id','=',$id)
        ->count();
    }
    $data1 = array();
    foreach($pres_dates as $key => $date){
      $data1[] = array($date->date, $date_count[$key]);
    }

    /*-----------------------ouverture------------------------- */
    $ouv_dates = Tableau::all('date','id')->sortBy('date');
    $ouv_count = array();

    foreach($ouv_dates as $date){
      $ouv_count[] = \DB::table('tableau_rows')
        ->select('Rdv_ouverture_de_porte as a')
        ->where('tableau_id','=',$date->id)
        ->where('agent','=',$id)
        ->get();
    }
    $data2 = array();
    foreach($ouv_dates as $key => $date){
      $data2[] = array($date->date, $ouv_count[$key]->first()->a);
    }
    $agent = User::find($id);
    return view('/statistiques/stats_agents',['data'=>$data1, 'ouvs'=>$data2, 'agent'=> $agent]);
  }
}
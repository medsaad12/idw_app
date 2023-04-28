<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salaire;
use App\Models\Presence;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CalculController extends Controller
{
  public function get_agents(Request $request){
    $agents = User::all()->filter(function($user){return $user->hasRole('AGENT');});
    return view('calculs/liste_agents', ['agents'=>$agents]);
  }

  public function get_agent_data(Request $request){
    $abs = array();
    $nbrabs = 0;
    $assuidite = true;
    $exists = false;
    $sal = 0;
    $date = null;
    $searched = false;
    $id = $request->segment(2);
    if(isset($request->date)){
      $searched = true;
      $date = $request->date;
      if(Salaire::whereRaw("MONTH(date) = $request->date AND YEAR(date) = $request->year AND agent_id = $id")->count()>0){
        $exists=true;
        $sal = Salaire::whereRaw("MONTH(date) = $request->date AND YEAR(date) = $request->year AND agent_id = $id")->get()[0]->salaire;
      }
      foreach(Presence::whereRaw("MONTH(date) = $request->date AND YEAR(date) = $request->year")->get() as $pres){
        /*-------------retard/decharge--------------*/
          $pers = \DB::table('presence_user')
            ->select('presence','hours','justificatif')
            ->where('presence_id','=',$pres->id)
            ->where('user_id','=',$request->segment(2))
            ->whereNotNull('hours')
            ->get();
          foreach(array($pers->first()) as $a){
            if($a != null) array_push($abs, array($pres->date, str_replace('é','e',$a->presence), $a->hours.' heures', $a->justificatif));
            if(count(array($pers->first())) > 3) $assuidite = false;
          }
        /*-----------------absence------------------*/
          $absence = \DB::table('presence_user')
            ->select('presence','justificatif')
            ->where('presence_id','=',$pres->id)
            ->where('user_id','=',$request->segment(2))
            ->where('presence','=','absent')
            ->get();
          foreach(array($absence->first()) as $a){
            if($a != null) array_push($abs, array($pres->date, str_replace('é','e',$a->presence), '--', $a->justificatif));
            if(count(array($pers->first())) > 2 && $a->justificatif != '') $assuidite = false;
            if($a != null && str_replace('é','e',$a->presence) == 'absence') $nbrabs++;
          }
        }
    }
    else{
      foreach(Presence::whereRaw("MONTH(date) = date('m') AND YEAR(date) = YEAR(curdate())")->get() as $pres){
        if(Salaire::whereRaw("MONTH(date) = date('m') AND YEAR(date) = YEAR(curdate()) AND agent_id = $id")->count()>0){
          $exists=true;
          $sal = Salaire::whereRaw("MONTH(date) = date('m') AND YEAR(date) = YEAR(curdate()) AND agent_id = $id")->get()[0]->salaire;
        }
        /*-------------retard/decharge--------------*/
          $pers = \DB::table('presence_user')
            ->select('presence','hours','justificatif')
            ->where('presence_id','=',$pres->id)
            ->where('user_id','=',$request->segment(2))
            ->whereNotNull('hours')
            ->get();
          foreach(array($pers->first()) as $a){
            if($a != null) array_push($abs, array($pres->date, str_replace('é','e',$a->presence), $a->hours.' heures', $a->justificatif));
            if(count(array($pers->first())) > 3) $assuidite = false;
          }
        /*-----------------absence------------------*/
          $absence = \DB::table('presence_user')
            ->select('presence','justificatif')
            ->where('presence_id','=',$pres->id)
            ->where('user_id','=',$request->segment(2))
            ->where('presence','=','absent')
            ->get();
          foreach(array($absence->first()) as $a){
            if($a != null) array_push($abs, array($pres->date, str_replace('é','e',$a->presence), '--', $a->justificatif));
            if(count(array($pers->first())) > 2 && $a->justificatif != '') $assuidite = false;
          }
        }
    }
    /*-----------------------------------------*/
    $user = User::find($request->segment(2));
    return view('calculs/calcul_agent',[
      'absences'=>$abs,
      "user"=>$user, 
      "assuidity"=>$assuidite, 
      'nbrabs'=>$nbrabs,
      'exists'=>$exists,
      'salaire'=>$sal,
      'searched'=>$searched,
      'month'=>$date
    ]);
  }
  
  public function save(Request $request){
    $salaire = new Salaire;
    $salaire->salaire = $request->salaire;
    $salaire->prime = $request->prime;
    $salaire->assuidité = $request->assuidite;
    $salaire->date = $request->date;
    $salaire->agent_id = $request->user_id;
    $salaire->save();
    return back();
  }
}


  
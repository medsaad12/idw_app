<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TableauRow;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function index(Request $request)
    {
        $agents = User::all()->filter(function ($user) {
            return $user->hasRole("AGENT");
        })->values()->all();
        $productions = array();
        foreach ($agents as $agent) {
            if ($request->de !== null || $request->a !== null ) {
                $data = TableauRow::where('agent', $agent->id)
                ->whereBetween('date', [$request->de, $request->a])
                ->get();
            }elseif($request->jour !== null){
                $data = TableauRow::where('agent', $agent->id)
                ->where('date', $request->jour)
                ->get();
            } else {
                $data = TableauRow::where('agent',$agent->id)->get();
            }
            
            $totals = collect($data)
            ->groupBy('agent')
            ->map(function ($group) {
            return[
                'agent_id' => $group[0]['agent'],
                'agent' => User::find($group[0]['agent'])->name,
                'Rdv_brut' => $group->sum('Rdv_brut'),
                'Rdv_confirme_telephone' => $group->sum('Rdv_confirme_telephone'),
                'Rdv_ouverture_de_porte' => $group->sum('Rdv_ouverture_de_porte'),
                'Rdv_annuler' => $group->sum('Rdv_annuler'),
            ];
            })->all();
            
            $productions = array_merge($productions, $totals);
        };
        return view('production.production' , ["productions"=>$productions]) ;
    }
}

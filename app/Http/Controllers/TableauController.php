<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Equipe;
use App\Models\Tableau;
use App\Models\TableauRow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TableauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tableaux.create-tableau');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'equipe_id' => 'required',
        ]);
     
        if ($validator->fails())
        {
            return back()->with('err', "quelque chose est incorrect ressayez !");
        }
        $tableau = new Tableau ;
        $tableau->date = $request->date ;
        $tableau->equipe_id = $request->equipe_id ;
        $tableau->save();
        $equipe = Equipe::find($request->equipe_id);
        
        $agents = array_map(function ($v)
        {
            return User::find($v);
        },json_decode($equipe->agents));
        foreach($agents as $agent){
            $tableau_row = new TableauRow ;
            $tableau_row->tableau_id = $tableau->id ;
            $tableau_row->agent = $agent->id ;
            $tableau_row->date = $tableau->date ;
            $req = ['Rdv_brut','Rdv_confirme_telephone','Rdv_ouverture_de_porte','Rdv_annuler'] ;
            for ($i=0; $i < count($req); $i++) { 
                $input = $agent->id."-".$req[$i];
                if ($request->has($input)) {
                    $column = $req[$i] ;
                    $tableau_row->$column = $request->$input;
                }
            }
            $tableau_row->save();
        }
        return redirect('tableaux/'.$request->equipe_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tableau  $tableau
     * @return \Illuminate\Http\Response
     */
    public function show(Tableau $tableau)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tableau  $tableau
     * @return \Illuminate\Http\Response
     */
    public function edit(Tableau $tableau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tableau  $tableau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tableau $tableau)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'equipe_id' => 'required',
        ]);
     
        if ($validator->fails())
        {
            return back()->with('err', "quelque chose est incorrect ressayez !");
        }
        $tableau = Tableau::find($request->segment(3)) ;
        $tableau->date = $request->date ;
        $tableau->equipe_id = $request->equipe_id ;
        $tableau->save();
        $equipe = Equipe::find($request->equipe_id);
        
        $agents = array_map(function ($v)
        {
            return User::find($v);
        },json_decode($equipe->agents));
        
        $rows = TableauRow::where('tableau_id',$tableau->id)->get();
        foreach($rows as $row){
            $agents = User::all()->filter(function ($user) {
                return $user->hasRole("AGENT");
            })->values()->all();
            foreach($agents as $agent){
                $Rdv_brut = $agent->id."-Rdv_brut" ;
                $Rdv_confirme_telephone = $agent->id."-Rdv_confirme_telephone" ;
                $Rdv_ouverture_de_porte = $agent->id."-Rdv_ouverture_de_porte" ;
                $Rdv_annuler = $agent->id."-Rdv_annuler" ;
                if ($request->has([$Rdv_brut,$Rdv_confirme_telephone,$Rdv_ouverture_de_porte,$Rdv_annuler]) && $agent->id == $row->agent) {
                    DB::table('tableau_rows')
                    ->where('agent',  $agent->id)
                    ->where('tableau_id', $tableau->id)
                    ->update([
                        'Rdv_brut' => $request->$Rdv_brut ,
                        'Rdv_confirme_telephone' => $request->$Rdv_confirme_telephone,
                        'Rdv_ouverture_de_porte' => $request->$Rdv_ouverture_de_porte,
                        'Rdv_annuler' => $request->$Rdv_annuler,
                        "date" => $request->date 
                    ]);
                }
            }
           
        }
        
        return redirect('tableaux/'.$request->equipe_id);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tableau  $tableau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tableau $tableau)
    {
        //
    }
}
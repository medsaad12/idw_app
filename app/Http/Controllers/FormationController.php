<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formations.formations',['formations'=>Formation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formations.create-formation');
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
            'nom' => 'required',
            'telephone' => 'required',
        ]);
     
        if ($validator->fails())
        {
            return back()->with('err', "quelque chose est incorrect ressayez !");
        }
        $formation = new Formation ;
        $formation->nom = $request->nom ;
        $formation->telephone = $request->telephone ;
        $formation->date_entre = $request->date_entre ;
        $formation->date_sortie = $request->date_sortie ;
        $formation->save();
        return redirect('/formations')->with('success', "Formation Créé avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        return view('formations.update-formation',['formation'=>$formation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'telephone' => 'required',
        ]);
     
        if ($validator->fails())
        {
            return back()->with('err', "quelque chose est incorrect ressayez !");
        }
        $formation->nom = $request->nom ;
        $formation->telephone = $request->telephone ;
        $formation->objectifs = $request->objectifs ;
        $formation->status = $request->etat ;
        $formation->date_entre = $request->date_entre ;
        $formation->date_sortie = $request->date_sortie ;
        $formation->save();
        return redirect('/formations')->with('success', "Formation Créé avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        $formation->delete() ;
        return redirect('/formations');
    }
}

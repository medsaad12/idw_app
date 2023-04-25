<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Entretien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntretienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('entretiens.entretiens' ,['entretiens'=>Entretien::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entretiens.create-entretien');
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
            'datetime' => 'required',
        ]);
     
        if ($validator->fails())
        {
            return back()->with('err', "quelque chose est incorrect ressayez !");
        }
        $datetime = $request->datetime ;
        $carbon = Carbon::parse($datetime);
        $date = $carbon->toDateString();
        $time  = $carbon->toTimeString();
        $entretien = new Entretien ;
        $entretien->nom = $request->nom ;
        $entretien->date = $date ;
        $entretien->telephone = $request->telephone ;
        $entretien->heure = $time ;
        $entretien->save();
        return redirect('/entretiens')->with('success', "Entretient Créé avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function show(Entretien $entretien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function edit(Entretien $entretien)
    {
        return view('entretiens.update-entretien',['entretien'=>$entretien]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entretien $entretien)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'telephone' => 'required',
            'date' => 'required',
        ]);
     
        if ($validator->fails())
        {
            return back()->with('err', "quelque chose est incorrect ressayez !");
        }
     
        $entretien->nom = $request->nom ;
        $entretien->date = $request->date ;
        $entretien->telephone = $request->telephone ;
        $entretien->heure = $request->heure ;
        $entretien->save();
        return redirect('/entretiens')->with('success', "Entretient Créé avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entretien $entretien)
    {
        $entretien->delete();
        return back();
    }
    public function search(Request $request )
    {
        $date = $request->date;
        $entretiens = Entretien::where('date',$date)->get();
        return view('entretiens.entretiens' ,['entretiens'=>$entretiens]);
    }
}
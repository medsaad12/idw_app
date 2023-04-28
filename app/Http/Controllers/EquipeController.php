<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::all();
        return view('equipes.equipes',['equipes'=>$equipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = User::all()->filter(function ($user) {
            return $user->hasRole("AGENT") ;
        });
        return view('equipes.create-equipe',['users'=>$agents]);
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
            'chef' => 'required',
        ]);
     
        if ($validator->fails())
        {
            return back()->with('err', "quelque chose est incorrect ressayez !");
        }

        $equipe = new Equipe ;
        $equipe->name = $request->nom ;
        $equipe->chef = $request->chef ; 
        $equipe->agents = json_encode($request->agents);
        $equipe->save();
        return redirect('/equipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        $agents = $agents = User::all()->filter(function ($user) {
            return $user->hasRole("AGENT") ;
        });
        return view('equipes.edit-equipe',['equipe'=>$equipe , 'users' => $agents]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'chef' => 'required',
        ]);
     
        if ($validator->fails())
        {
            return back()->with('err', "quelque chose est incorrect ressayez !");
        }

        $equipe->name = $request->nom ;
        $equipe->chef = $request->chef ; 
        $equipe->agents = json_encode($request->agents);
        $equipe->save();
        return redirect('/equipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
        return redirect('/equipes');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Calendrier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    public function get(Request $request){
        $list = Calendrier::all();
        return view('calendrier/calendrier',['liste_f'=>$list]);
    }

    public function delete(Request $request){
        $id = $request->segment(3);
        $jour = Calendrier::find($id);
        $jour->delete();
        return back();
    }

    public function edit(Request $request){
        $id = $request->segment(3);
        $jour = Calendrier::find($id);
        if($request->mod == 'hehe'){
            $jour->Ferier = $request->jourf;
            $jour->Date = $request->date;
            $jour->save();
            return redirect('/calendrier');
        }
        else return view('calendrier/update_jour',['jour'=>$jour]);
    }

    public function add(Request $request){
        $jour = new Calendrier;
        $jour->Ferier = $request->jourf;
        $jour->Date = $request->date;
        $jour->save();
        return redirect('/calendrier');
    }
}
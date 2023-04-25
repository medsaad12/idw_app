<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('presence.tableau',['users'=>User::all() , "presence"=>Presence::orderBy('created_at', 'desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presence.create-tableau',['users'=>User::all()]);
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
        ]);
     
        if ($validator->fails())
        {
            return back()->with('err', "quelque chose est incorrect ressayez !");
        }else{
            $presence = new Presence ; 
            $presence->date = $request->date ;
            $presence->save();
            $users = User::all();
            $myTab = array();
            foreach ($users as $user) {
                $reqvar = $user->id."-presence" ;
                $n_retard = $user->id."-retard" ;
                $n_decharge = $user->id."-decharge" ;
                if ($request->has($reqvar)) {
                    if ($request->$reqvar[0] ==  "en-retard" || "décharge") {
                        $arr = ["userId" => $user->id , "presence" => $request->$reqvar[0] , "hours" => $request->$n_retard > 0 ? $request->$n_retard : $request->$n_decharge  ];
                    } else {
                        $arr = ["userId" => $user->id , "presence" => $request->$reqvar[0]];
                    }
                    
                    array_push($myTab, $arr);
                }
            }
            foreach ($myTab as $item) {
                if(array_key_exists('hours', $item)){
                    DB::table('presence_user')->insert(
                        ['presence_id' => $presence->id , 'user_id' => $item["userId"] , 'presence' => $item["presence"] , 'hours' => $item['hours'],  'created_at' => now(),
                        'updated_at' => now() ]
                    );
                }else{
                    DB::table('presence_user')->insert(
                        ['presence_id' => $presence->id , 'user_id' => $item["userId"] , 'presence' => $item["presence"] ,  'created_at' => now(),
                        'updated_at' => now() ]
                    );
                }
                
            }
            return back()->with('succes', "sc");
        }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function show(Presence $presence)
    {
       $pres_id = $presence->id;
       $date = Presence::find($pres_id);
       $users =  $presence->users ;
       $myTab = array();
       $attendaces = DB::table('presence_user')
                ->select('user_id', 'presence' , 'hours')
                ->where('presence_id',$presence->id)
                ->get();
        foreach ($attendaces as $attendace) {
            if ($attendace->hours !== null ) {
                $arr = ["userName" => User::find($attendace->user_id)->name , "presence" => $attendace->presence  , 'hours' => $attendace->hours];
            } else {
               $arr = ["userName" => User::find($attendace->user_id)->name , "presence" => $attendace->presence  ];

            }
            
            array_push($myTab, $arr);
        }
        return view('presence.presence',['users'=>$users , "attendaces"=>$myTab , 'pres_date'=>$date]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function edit(Presence $presence)
    {
       $users =  $presence->users ;
       $myTab = array();
       $attendaces = DB::table('presence_user')
                ->select('user_id', 'presence' , 'hours')
                ->where('presence_id',$presence->id)
                ->get();
        foreach ($attendaces as $attendace ) {
            if ($attendace->hours !== null ) {
                $arr = ["userName" => User::find($attendace->user_id)->name , "presence" => $attendace->presence  , 'hours' => $attendace->hours];
            } else {
               $arr = ["userName" => User::find($attendace->user_id)->name , "presence" => $attendace->presence  ];

            }
            array_push($myTab, $arr);
        }
        return view('presence.edit-tableau',[ 'presence' => $presence ,"users" => $users , "attendaces" => $myTab ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presence $presence)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
        ]);
     
        if ($validator->fails())
        {
            return back()->with('err', "quelque chose est incorrect ressayez !");
        }else{
            $presence->date = $request->date ;
            $presence->save();
            $users = User::all();
            $myTab = array();
            foreach ($users as $user) {
                $reqvar = $user->id."-presence" ;
                $n_retard = $user->id."-retard" ;
                $n_decharge = $user->id."-decharge" ;
                if ($request->has($reqvar)) {
                    if ($request->$reqvar[0] ==  "en-retard" || "décharge") {
                        $arr = ["userId" => $user->id , "presence" => $request->$reqvar[0] , "hours" => $request->$n_retard > 0 ? $request->$n_retard : $request->$n_decharge  ];
                    } else {
                        $arr = ["userId" => $user->id , "presence" => $request->$reqvar[0]];
                    }
                    
                    array_push($myTab, $arr);
                }
            }
            foreach ($myTab as $item) {
                if(array_key_exists('hours', $item)){
                    DB::table('presence_user')
                    ->where('presence_id',  $presence->id)
                    ->where('user_id', $item["userId"])
                    ->update(['presence' => $item["presence"] , 'hours' => $item["hours"]  ]);
                }else{
                    DB::table('presence_user')
                    ->where('presence_id',  $presence->id)
                    ->where('user_id', $item["userId"])
                    ->update(['presence' => $item["presence"] ]);
                }
            }
            return back()->with('succes', "sc");
        }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presence $presence)
    {
        //
    }

    public function presence_user(Request $request)
    {
        $name = $request->segment(3);
        $user = User::where('name' ,$name)->get()->toArray()[0];
        $presence = DB::table('presence_user')
        ->select('presence','hours','presence_id')
        ->where('user_id', $user["id"])
        ->orderBy('created_at', 'desc')
        ->get();
        $attendances = array();
        foreach($presence as $item){
            if($item->hours !== null ){
                $arr = ["presence" => $item->presence , "hours" => $item->hours , "date" => Presence::find($item->presence_id)->date  ];
            }else{
                $arr = ["presence" => $item->presence  , "date" => Presence::find($item->presence_id)->date  ];
            }
            array_push($attendances, $arr);
        };
        return view('presence.presence-user',['user'=>$user,'attendances'=>$attendances]);
    }
}

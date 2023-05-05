<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (count(Auth::user()->groups)>0) {
            $randomGroup = Auth::user()->groups->first();
            $groupes = Auth::user()->groups;
            $messages = $randomGroup->messages ;
            return view('chat.groupes',['groupes' => $groupes , 'group' => $randomGroup , "messages"=>$messages]);
        } else {
            if (Auth::user()->hasRole(['ADMIN'])) {
                return redirect('/groupes/create');
            }else{
                return view('chat.err');
            }
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('chat.create-groupe',['users' => $users]);
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
            'group_name' => 'required',
        ]);
     
        if ($validator->fails())
        {
            return back()->with('err', "quelque chose est incorrect ressayez !");
        }
     
        $groupe = new Group ;
        $groupe->group_name = $request->group_name ;
        $groupe->save();
        $ids = $request->members ;
        DB::table('group_user')->insert(
            ['group_id' => $groupe->id , 'user_id' => Auth::user()->id]
        );
        foreach ($ids as $id) {
            $member = User::find($id);
            DB::table('group_user')->insert(
                ['group_id' => $groupe->id , 'user_id' => $member->id]
            );
          }

        return redirect('/groupes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request , Group $group)
    {
        $requested_group =  Group::find($request->segment(2));
        $groupes = Auth::user()->groups;
        if ($groupes->contains($requested_group) == 1 ) {
            $currentGroup = $requested_group;
            $messages = $currentGroup->messages;
            return view('chat.groupes',['groupes' => $groupes , 'group' => $currentGroup , "messages"=>$messages]);
        } else {
            return abort(403,"YOU CAN'T ACCES THIS PAGE");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Group $group)
    {
        $id = $request->segment(2);
        $group = Group::find($id);
        $group->delete() ;
        return back();
    }
}

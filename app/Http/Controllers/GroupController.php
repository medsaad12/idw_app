<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $randomGroup = Auth::user()->groups->first();
        $groupes = Auth::user()->groups;
        $messages = $randomGroup->messages ;
        return view('chat.groupes',['groupes' => $groupes , 'group' => $randomGroup , "messages"=>$messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(Group $group)
    {
        //
    }
}

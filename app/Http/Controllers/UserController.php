<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.users',["users"=>User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        return view('users.create-user',['roles'=>Role::all() , 'permissions' => Permission::all()]);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required','min:8']
        ]); 
        if ($validator->fails()) {
            return back();
        }
        $user = new User ;
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->password = Hash::make($request['password']) ;
        $user->save();   
        if ($request->has('role')) {
            $user->assignRole($request->role) ;
            return redirect('/users');
        } else {
            foreach ($request->permissions as $permission){
            $user->givePermissionTo($permission) ;
        }
            return redirect('/users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.update-user',['roles'=>Role::all() , 'permissions' => Permission::all() , 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'password' => ['required','min:8']
        ]); 
        if ($validator->fails()) {
            return back();
        }
        
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->password = Hash::make($request['password']) ;
        $user->save();   
        if ($request->has('role')) {
            $user->assignRole($request->role) ;
            return redirect('/users');
        } else {
            foreach ($request->permissions as $permission){
            $user->givePermissionTo($permission) ;
        }
            return redirect('/users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}

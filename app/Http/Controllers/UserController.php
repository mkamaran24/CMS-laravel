<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Role;
class UserController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  bcrypt('password')
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/ava.png'

        ]);

          return redirect('/user/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('users.edit')->with('user',$user)->with('roles',Role::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $this->validate($request,[
            "name"    => "required",
            "role"  => "required|array|min:1"
        ]);

        

        $user = User::findorfail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        
        // the parameter is an array
        $user->syncRoles($request->role);

        $user->save();

        return redirect('/user/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function admin($id)
    {
        $user = User::findorfail($id);
        
        $user->admin = 1;

        $user->save();

        return redirect()->back();
    }

    public function notadmin($id)
    {
        $user = User::findorfail($id);
        
        $user->admin = 0;

        $user->save();

        return redirect()->back();
    }
}

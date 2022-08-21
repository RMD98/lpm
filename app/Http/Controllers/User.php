<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class User extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('checkRole:super admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all user data
        $data  = DB::table('users')->get();
        return view('user/user',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new user data
        return view('user/add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store new user data
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = array(
            'name' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        );
        DB::table('users')->insert($data);

        return redirect()->action([User::class,'index']);
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
        //edit user data
        $data = DB::table('users')->where('id',$id)->first();

        return view('user/edit_user',compact('data'));
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
        //update user data
        $data = array(
            'name'=> $request->nama,
            'email' => $request->email,
            'role' => $request->role,
        );

        if($request->password != ''){
            if($request->password == $request->confirm){
               $data = array_merge($data,[ 'password' => \Hash::make($request->password)]);
            }else
            {   
                return \Redirect::back();
            }
        };
        DB::table('users')->where('id',$id)->update($data);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete user data
        DB::table('users')->where('id',$id)->delete();
        return redirect()->action([User::class,'index']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.signup');
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
        // Validate data
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required', 'min:5']
        ]);

        // Encrypt data password dengan bcrypt
        // $encryptedPassword = bcrypt($validatedData['password']); 

        // Encrypt data password dengan Hash::make
        $encryptedPassword = Hash::make($validatedData['password']); 

        // Store data dengan Query Builder
        DB::table('users')->insert([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $encryptedPassword
        ]);
       
        // Redirect dengan Message
        return redirect('/signin')->with('success', 'Sign-Up process success! Please Sign-In to start You session!');
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
        //
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
        //
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
}

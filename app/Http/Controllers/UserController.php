<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data berdasarkan user yang login
        $userData = Auth::user();

        return view('user.index', ['userData' => $userData]);
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
        // Ambil data user berdasarkan id
        $userData = User::find($id);

        return view('user.edit', [ 'userData' => $userData]);
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
        // validasi data
        $validatedData = $request->validate([
            'name' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'email:dns'],
            'telp' => ['required'],
            'address' => ['required'],
            'enterprise' => ['required'],
            'position' => ['required']
        ]);

        // user photo name
        $user = str_replace(" ","",$request->name);
        $user = $user.'_'.$request->id;

        if($request->file('photo')){
            $validatedData['photo'] = $request->validate([
                'photo' => 'image|file|max:3072', // dalam satuan kB (1 MB = 1024 kB)
            ]);

            // Hapus foto sebelumnya jika ada
            if($request->prevPhoto != ''){
                Storage::delete($request->prevPhoto); 
            }

            // upload file pada path: gudangApp/storage/app/public/users/<users>/images/
            $validatedData['photo'] = $request->file('photo')->store('users/'.$user.'/images');
        }
        
        // Update table dengan Eloquent ORM
        User::where('id', $id)->update($validatedData);

        // Redirect
        return redirect('/user');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $user = str_replace(" ","",$request->delUser);
        $user = $user.'_'.$request->id;
        
        // Delete folder user yang bersangkutan
        Storage::deleteDirectory('users/'.$user);

        // Menghapus data user di database
        User::destroy($id);
        
        // Proses Sign Out
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home');
    }
}

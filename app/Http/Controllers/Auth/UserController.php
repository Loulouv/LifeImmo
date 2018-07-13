<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Document;
use Auth;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){

        $user = auth()->user();

        return view ('users.profile', compact('user', $user));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        $user = auth()->user();
        $userDocuments = Document::where('user_id' , '=', $user->id)->get();

        return view ('users.edit', compact('user', $user));

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $user = auth()->user();

        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,'. $user->id,
            'fname' => 'required|string|max:255',
            'sname' => 'required|string|max:255',
            'phone' => 'required|regex:/(^0[1-68][0-9]{8}$)/',
            'address' => 'nullable|string|max:255',
            'cp' => 'nullable|regex:/(^[0-9]{5,5}$)/',
            'city' => 'nullable|string|max:255',
        ]);

        $user->fname  = $request->get('fname');
        $user->sname  = $request->get('sname');
        $user->phone  = $request->get('phone');
        $user->email  = $request->get('email');
        $user->address = $request->get('address');
        $user->cp     = $request->get('cp');
        $user->city   = $request->get('city');
        $user->save();

        return back();
        //return redirect('/profile/edit');
        //return view ('users.edit', compact('user', $user))->with('message', 'Le profil a bien été mis à jour');
        
    }

    
}

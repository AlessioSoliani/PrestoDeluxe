<?php

namespace App\Http\Controllers;

use App\Models\user_profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('UsersProfiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profile= user_profile::create([            
            'username'=>$request->input('username'),
            'email'=>$request->input('email'),
            'phone_number'=>$request->input('phone_number'),
            'user_id'=>$request->input('user_id'),

        ]);
        if($request->hasFile('profile_picture')){
            $profile->profile_picture=$request->file('profile_picture')->storeAs('public/user_profile/'.$profile->id,'cover.jpg');
            $profile->save();
        }
        return redirect()->back()->with(['success','il tuo profilo è pronto']);
        

    }

    /**user
     * Display the specified resource.
     */
    public function show(user_profile $user_profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user_profile $user_profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user_profile $user_profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user_profile $user_profile)
    {
        //
    }
}

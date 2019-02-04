<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profile.profile', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = Profile::where('user_id', Auth::user()->id)->count();
        return view('profile.profile-create', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
    
        $newprofile = new Profile;
        $newprofile->lastname = $request->lastname;
        $newprofile->firstname = $request->firstname;
        $newprofile->gsm = $request->gsm;
        $newprofile->birthday = $request->birthday;
        $newprofile->picture = $request->picture->store('', 'pictures');
        $newprofile->user_id = Auth::user()->id;
        $newprofile->save();

        $profiles = Profile::all();
        return view('profile.profile', compact('profiles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('profile.profile-show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profile.profile-edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $profile->lastname = $request->lastname;
        $profile->firstname = $request->firstname;
        $profile->gsm = $request->gsm;
        $profile->birthday = $request->birthday;
        if(isset($request->picture)){
            $profile->picture = $request->picture->store('', 'pictures');
        }
        $profile->save();

        $profiles = Profile::all();
        return view('profile.profile', compact('profiles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        $profiles = Profile::all();
        return view('profile.profile', compact('profiles'));
    }
}

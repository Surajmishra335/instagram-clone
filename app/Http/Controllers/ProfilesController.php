<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Cache;

use App\User;
use App\Profile;

class ProfilesController extends Controller
{
    public function index(User $user){
        
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.post'. $user->id, 
            now()->addSecond(30), 
            function() use ($user){
                return $user->posts->count();
        });

        $followersCount = Cache::remember(
            'count.followers'. $user->id, 
            now()->addSecond(30), 
            function() use ($user){
                return $user->profile->followers->count();
        });
        //$followingCount = $user->following->count();

        $followingCount = Cache::remember(
            'count.following'. $user->id, 
            now()->addSecond(30), 
            function() use ($user){
                return $user->following->count();
        });

        return view('profiles.index', compact('user', 'follows' ,'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user){

        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);

        $data = request()->validate([

            'title' =>  'required',
            'description' =>  'required',
            'url' =>  '',
            'image' => ''

        ]);

        if(request('image')){

            $image_path = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$image_path}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $image_path];

        }
       
       
        auth()->user()->profile->update(array_merge(

            $data,

            $imageArray ?? []
            
        ));


        return redirect("/profile/{$user->id}");

        
    }

    public function allprofile(){
        $profiles = Profile::all();

      

        return view('profiles.all', compact('profiles'));
    }
}

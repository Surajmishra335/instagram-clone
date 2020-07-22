<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

use App\Post;
use App\User;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->get();

        return view('posts.index', compact('posts'));

        dd($posts);
    }
    
    
    public function create(){
        return view('posts.create');
    }

    public function store(){

        $data = request()->validate([

            'caption'=> 'required',
            'image'=> ['required', 'image', 'mimes:jpeg,bmp,png,jpg,gif', 'max:1536000000000000']

        ]);

        $image_path = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([

            'caption'=>$data['caption'],
            'image'=> $image_path,

        ]);

        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(\App\Post $post){

        return view('posts.show', compact('post'));
    }



}


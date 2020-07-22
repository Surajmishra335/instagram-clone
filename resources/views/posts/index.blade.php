@extends('layouts.app')

@section('content')
    
    <div class="container">
       
        @foreach($posts as $post)
        <div class="card mb-4 home-image">
            <div class="card-body">
                <div class="row pb-2">
                    <div class="col-sm-12 d-flex align-items-center">
                        <a href="/profile/{{$post->user->id}}">
                            <img src="/storage/{{$post->user->profile->image}}" alt="" class="post-profile-image">
                        </a>

                        <p class="pl-4"><span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></span></p>
                    </div>
                </div>               
                <div class="row">
                    <div class="col-sm-12">
                        <a href="/profile/{{$post->user->id}}">
                            <img src="/storage/{{$post->image}}" alt="" class="w-100"> 
                        </a>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-sm-12">
                        <div>
                            <p><span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></span> {{$post->caption}}</p>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
          
        @endforeach 
        <!-- <div class="row">
            <div class="col-sm-12 d-flex justify-content-center"> 
                
            </div>
        </div> -->
        
            
        
    </div>

@endsection
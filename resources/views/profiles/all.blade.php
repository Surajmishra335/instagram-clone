@extends('layouts.app')

@section('content')
    
    <div class="container">
        @foreach($profiles as $profile)

        <a href="/profile/{{$profile->id}}">
            <div class="card home-image mb-2">
                <div class="card-body">
                        <div class=" d-flex">
                            <div class="pr-2">
                                @if($profile->image)
                                    <img src="/storage/{{$profile->image}}" class="post-profile-image-login" alt="">
                                @else
                                    <img src="/images/user.png" alt="" class="post-profile-image-login">
                                @endif
                            </div>
                            <div class="d-flex">
                                <div class="pr-2">
                                        <p><span class="text-dark">{{$profile->user->username}}</span></p>
                                </div>
                                <div class="pl-2">
                                        <p><span class="">{{$profile->user->posts->count()}} Post</span></p>
                                </div>
                                <div class="pl-2">
                                        <p><span class="">{{$profile->followers->count()}} Follower</span></p>
                                </div>
                                <div class="pl-2">
                                        <p><span class="">{{$profile->user->following->count()}} Following</span></p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </a>

        @endforeach
    </div>

@endsection
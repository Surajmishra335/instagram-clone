@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label ">Title</label>
                        <input id="title"
                                name="title"
                                type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                value="{{ old('title') ?? $user->profile->title}}" 
                                autocomplete="title" autofocus>

                        @if($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('title')}}</strong>
                            </span>
                        @endif
                        
                    </div>            
                </div>        
            </div>
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label ">Description</label>
                        <input id="description"
                                name="description"
                                type="text" 
                                class="form-control @error('description') is-invalid @enderror" 
                                value="{{ old('description') ?? $user->profile->description}}" 
                                autocomplete="description" autofocus>

                        @if($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('description')}}</strong>
                            </span>
                        @endif
                        
                    </div>            
                </div>        
            </div>
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label ">Url</label>
                        <input id="url"
                                name="url"
                                type="text" 
                                class="form-control @error('url') is-invalid @enderror" 
                                value="{{ old('url') ?? $user->profile->url}}" 
                                autocomplete="url" autofocus>

                        @if($errors->has('url'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('url')}}</strong>
                            </span>
                        @endif
                        
                    </div>            
                </div>        
            </div>
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <label for="image" class="col-md-4 col-form-label ">Profile Image</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                    @if($errors->has('image'))
                        
                            <strong>{{$errors->first('image')}}</strong>
                        
                    @endif
                </div>
            </div>

            <div class="row py-4">
                <div class="col-sm-8 offset-2">
                    <button class="btn btn-primary" type="submit">Save profile</button>
                </div>
            </div>
    </form>   
</div>
@endsection

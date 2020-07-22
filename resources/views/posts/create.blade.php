@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/p" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label ">Post Caption</label>
                        <input id="caption"
                                name="caption"
                                type="text" 
                                class="form-control @error('caption') is-invalid @enderror" 
                                value="{{ old('caption') }}" 
                                autocomplete="caption" autofocus>

                        @if($errors->has('caption'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('caption')}}</strong>
                            </span>
                        @endif
                        
                    </div>            
                </div>        
            </div>
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <label for="image" class="col-md-4 col-form-label ">Post Image</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                    @if($errors->has('image'))
                        
                            <strong>{{$errors->first('image')}}</strong>
                        
                    @endif
                </div>
            </div>

            <div class="row py-4">
                <div class="col-sm-8 offset-2">
                    <button class="btn btn-primary" type="submit">Add New Post</button>
                </div>
            </div>
       </form>       
    </div>

@endsection
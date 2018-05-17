@extends('layouts.settinglayout')
@extends('layouts.app')

@section('homecontent')
<div class="container" style="margin-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome {{ $current_user->name }} <br>
                
                    Select your branch:

                    V-mall
                    Gabaholic
                    Metro Watch Emporium

                    <hr>

                    <h5> CHANGE PROFILE PICTURE </h5>
                    <div class="row">
                        <div class="col-md-1 offset-md-1">
                        <img src="{{ $current_user->image }}" style="width:150px; height:150px; border-radius: 50%; margin-right:25px;">
                        </div>
                        
                        <div class="col-md-9">
                        <form method="POST" action="/profile" enctype="multipart/form-data" style="position: relative; top: 30px;">
                             @csrf

                            <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-2" style="margin-top: 5px;">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                            </div>
                          
                            </div>

                            
                            

                        </form>
                        </div>
                    </div>

                    




                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@yield("footercontent")


@extends('layouts.adminsettinglayout')
@extends('layouts.adminapp')

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
                    
                    <div class="row">
                        <div class="col-md-3">
                        <h5 style="text-align: center;"> PROFILE PICTURE </h5>
                        <img src="{{ $current_user->image }}" style="width:150px; height:150px; border-radius: 50%;margin-left: 20%;">
                        </div>
                        
                        <div class="col-md-6">
                            <form method="POST" action="/adminprofile" enctype="multipart/form-data" style="position: relative; top: 70px;">
                                 @csrf

                                <div class="form-group row">
                                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Image') }}</label>

                                        <div class="col-md-6">
                                            <input id="image" type="file" onchange="showMyAvatar(this)" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

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

                        <div class="col-md-3">
                            <h5 style="text-align: center;"> &nbsp; </h5>
                            <img id="thumbnil" style="width:150px; height:150px; border-radius: 50%; border: 2px dotted black ;margin-left: 20%;">
                        </div>
                    </div>

                    




                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function showMyAvatar(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil");            
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }

    
</script>

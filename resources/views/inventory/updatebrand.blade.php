@extends('inventory.itemlayout')
@extends('layouts.adminapp') 

@section('item_content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('UPDATE BRAND') }}</div>

                <div class="card-body">

                    {{$brandselect->id}}
                    {{$brandselect->brandname}}
                    <hr>
                    
                    @if($brandselect->brandimage != '0' )
                        <img src="/{{ $brandselect->brandimage }}" style="width:300px; height:100px; margin-right:25px;">
                    @endif
                    <hr>
                    

                    <form method="POST" action="/updatebrand/$brandselect->id" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="brandid" value="{{$brandselect->id}}">

                        <div class="form-group row">
                            <label for="updatebrand" class="col-md-2 col-form-label text-md-right">{{ __('Update Brand') }}</label>

                            <div class="col-md-5">
                                <input id="updatebrand" type="text" class="form-control{{ $errors->has('updatebrand') ? ' is-invalid' : '' }}" name="updatebrand" value="{{$brandselect->brandname}}" required autofocus>

                                @if ($errors->has('updatebrand'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('updatebrand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="updatebrandimage" class="col-md-2 col-form-label text-md-right">{{ __(' Update Image') }}</label>

                            <div class="col-md-5">
                                <input id="updatebrandimage" type="file" onchange="showMyBrandImage(this)" class="form-control{{ $errors->has('updatebrandimage') ? ' is-invalid' : '' }}" name="updatebrandimage" value="{{ old('updatebrandimage') }}" autofocus>

                                @if ($errors->has('updatebrandimage'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('updatebrandimage') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-5">
                                <img id="thumbnilbrand" style="width:300px; margin:10px;"/><br>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('UPDATE BRAND') }}
                                </button>
                            </div>
                        </div>

                        <hr>

                    </form>

                        

                        


                </div>
            </div>
        </div>
    </div>
</div>










@endsection

<script>
function showMyBrandImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnilbrand");            
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

<script src="public/js/app.js"></script>
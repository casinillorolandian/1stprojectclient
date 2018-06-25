@extends('inventory.itemlayout')
@extends('layouts.adminapp') 

@section('item_content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('ADD BRAND') }}</div>

                <div class="card-body">

                    <form method="POST" action="/newbrand/" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="addbrand" class="col-md-2 col-form-label text-md-right">{{ __('Add Brand') }}</label>

                            <div class="col-md-10">
                                <input id="addbrand" type="text" class="form-control{{ $errors->has('addbrand') ? ' is-invalid' : '' }}" name="addbrand" value="{{ old('addbrand') }}" required autofocus>

                                @if ($errors->has('addbrand'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('addbrand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brandimage" class="col-md-2 col-form-label text-md-right">{{ __(' Brand Image') }}</label>

                            <div class="col-md-5">
                                <input id="brandimage" type="file" onchange="showMyBrandImage(this)" class="form-control{{ $errors->has('brandimage') ? ' is-invalid' : '' }}" name="brandimage" value="{{ old('brandimage') }}" autofocus>

                                @if ($errors->has('brandimage'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('brandimage') }}</strong>
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
                                    {{ __('SUBMIT NEW BRAND') }}
                                </button>
                            </div>
                        </div>

                        <hr>

                    </form>

                        <div class="row">
                            <div class="col-md-4 offset-md-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#brandlist">UPDATE BRANDS </button>
                            </div>
                        </div>

                        <!-- The Modal -->
                          <div class="modal" id="brandlist">
                            <style scoped>
                                .modal-lg {
                                    max-width: 90% !important;
                                }
                            </style>
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                              
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">List of Brands</h4>
                                  
                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <table class="table table-hover table-dark table-sm ">
                                      <thead>

                                        <tr>
                                          <th style="width: 10%" scope="col">Brand No.</th>
                                          <th style="width: 30%" scope="col">Brandname</th>
                                          <th style="width: 50%" scope="col">Image</th>
                                          <th style="width: 10%" scope="col">Update</th>
                                        </tr>
                                      </thead>

                                      

                                          @foreach($brandselects as $brandselect)

                                            <tbody id="branding{{$brandselect->id}}">
                                                <td> {{$brandselect->id}} </td>
                                                <td> {{$brandselect->brandname}} </td>
                                                <td> 
                                                    @if($brandselect->brandimage != '0' )
                                                    <img src="/{{ $brandselect->brandimage }}" style="width:300px; height:100px; margin-right:25px;">
                                                    @endif
                                                </td>
                                                <td> 
                                                    <a href='{{url("updatebrand/$brandselect->id/")}}' class="btn btn-info btn-md" role="button">Change</a>
                                                </td>
                                            </tbody>

                                          @endforeach

                                          

                                    </table>
                                </div>
                                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                
                              </div>
                            </div>
                          </div>


                </div>
            </div>
        </div>
    </div>
</div>







<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('ITEM CREATE') }}</div>

                <div class="card-body">

                    <script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                        <link rel="stylesheet" type="text/css" id="u0" href="http://cdn.tinymce.com/4/skins/lightgray/skin.min.css">
                        <script type="text/javascript">
                    tinymce.init({
                      selector : "textarea",
                      plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
                      toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                    });
                    </script>


                    



                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <!-- <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="category" class="col-md-2 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-10">

                            	<select id="category" type="text" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="{{ old('category') }}" required>
                            		<option value="" selected>Choose Category:</option>
									<option value="Accessories">Accessories</option>
									<option value="Bags">Bags</option>
                                    <option value="Luggages">Luggages</option>
									<option value="Footwears">Footwears</option>
									
									<option value="Wallets">Wallets</option>
								</select>

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group row" id="changeBrand">
                            
                            <label for="brand" class="col-md-2 col-form-label text-md-right">{{ __('Brand') }}</label>

                            <div class="col-md-10">
                                <div id="changeBrand">
                                <!-- <button onclick="myFunction()">Change to Type New Brand:</button> -->
                                <select id="brand" type="text" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand" value="{{ old('brand') }}" required>
                                    <option value="" selected>Choose Brand:</option>
                                    @foreach($brandselects as $brandselect)
                                        <option value="{{$brandselect->id}}">{{$brandselect->brandname}}</option>
                                    @endforeach

                                </select>
                                </div>

                                @if ($errors->has('brand'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Item Description') }}</label>

                            <div class="col-md-10">

                            	<textarea id="description" type="text" class=" {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}"></textarea>
                                

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="note" class="col-md-2 col-form-label text-md-right">{{ __('Notes') }}</label>

                            <div class="col-md-10">
                                <textarea id="note" type="text" class=" {{ $errors->has('description') ? ' is-invalid' : '' }}" name="note" value="{{ old('note') }}"></textarea>

                                @if ($errors->has('note'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <h1 style="text-indent: 16%;">Upload</h1>
                        <hr>

                        <div class="form-group row">
                            <label for="1stimage" class="col-md-2 col-form-label text-md-right">{{ __(' Primary Image') }}</label>

                            <div class="col-md-5">
                                <input id="1stimage" type="file" onchange="showMyImage(this)" class="form-control{{ $errors->has('1stimage') ? ' is-invalid' : '' }}" name="1stimage" value="{{ old('1stimage') }}" autofocus>

                                @if ($errors->has('1stimage'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('1stimage') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-5">
                                <img id="thumbnil" style="width:300px; margin:10px;"/><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="2ndimage" class="col-md-2 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-5">
                                <input id="2ndimage" type="file" onchange="showMyImage2(this)" class="form-control{{ $errors->has('2ndimage') ? ' is-invalid' : '' }}" name="2ndimage" value="{{ old('2ndimage') }}" autofocus>

                                @if ($errors->has('2ndimage'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('2ndimage') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-5">
                                <img id="thumbnil2" style="width:300px; margin:10px;"/><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="3rdimage" class="col-md-2 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-5">
                                <input id="3rdimage" type="file" onchange="showMyImage3(this)" class="form-control{{ $errors->has('3rdimage') ? ' is-invalid' : '' }}" name="3rdimage" value="{{ old('3rdimage') }}" autofocus>

                                @if ($errors->has('3rdimage'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('3rdimage') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-5">
                                <img id="thumbnil3" style="width:300px; margin:10px;"/><br>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-10">
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="00000000" autofocus>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="barcode" class="col-md-2 col-form-label text-md-right">{{ __('Barcode') }}</label>

                            <div class="col-md-10">
                                <input id="barcode" type="text" class="form-control{{ $errors->has('barcode') ? ' is-invalid' : '' }}" name="barcode" value="{{$latestbarcode}}" autofocus>

                                @if ($errors->has('barcode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('barcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ADD ITEM IN INVENTORY') }}
                                </button>
                            </div>
                        </div>
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

    function showMyImage(fileInput) {
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

    function showMyImage2(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil2");            
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

    function showMyImage3(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil3");            
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



    function myFunction() {
    document.getElementById("changeBrand").innerHTML = 
          '<button onclick="myFunction2()">Change to Selecting Brands:</button>' 
        + '<input id="brand" type="text" name="brand" value="" required autofocus>';
    }

    function myFunction2() {
    document.getElementById("changeBrand").innerHTML = 
          '<button onclick="myFunction()">Change to Type New Brand:</button>' 
        + '<select id="brand" type="text"  name="brand" required>' 
        + '<option value="" selected>Choose Brand:</option>' 
        + '<?php foreach($brandselects as $brandselect) { ?>' 
            + '<option value="{!! json_encode($brandselect->id) !!}"> {!! json_encode($brandselect->brandname) !!} </option>' 
        + '<?php } ?>';
    }


</script>

<script src="public/js/app.js"></script>
@extends('inventory.itemlayout')
@extends('layouts.adminapp') 

@section('item_content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#brandlist">List of Brands </button>
                            </div></div>

                <div class="card-body">


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
                <div class="card-header">{{ __('Item Update') }}</div>

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
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $all_items->itemname }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="category" class="col-md-2 col-form-label text-md-right">{{ __('Item Category') }}</label>

                            <div class="col-md-10">

                                <select id="category" type="text" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="{{ old('category') }}" required>
                                    <option value="" selected disabled>Choose:</option>

                                    <option value="{{ $all_items->category }}" selected> Old Value: {{ $all_items->category }} </option>

                                    @if($all_items->category != 'Accessories')
                                    <option value="Accessories">Accessories</option>
                                    @endif

                                    @if($all_items->category != 'Bags')
                                    <option value="Bags">Bags</option>
                                    @endif

                                    @if($all_items->category != 'Luggages')
                                    <option value="Luggages">Luggages</option>
                                    @endif

                                    @if($all_items->category != 'Footwears')
                                    <option value="Footwears">Footwears</option>
                                    @endif

                                    @if($all_items->category != 'Wallets')
                                    <option value="Wallets">Wallets</option>
                                    @endif


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

                                    <option value="{{$brandname->id}}" selected> Old Value: {{$brandname->brandname}} </option>

                                    @foreach($brandselects as $brandselect)
                                        @if($brandselect->brandname != $brandname->brandname)
                                        <option value="{{$brandselect->id}}">{{$brandselect->brandname}}</option>
                                        @endif
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
                        
                        <br>
                        <hr>
                        <br>
                        <h1 style="text-indent: 16%;">Upload</h1>
                        
                        
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
                                <img id="thumbnil" src="/{{ $all_items->itemimage1 }}" style="width:300px; margin:10px;"/><br>
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

                            @if($all_items->itemimage3 == 0)
                            <div class="col-md-5">
                                <img id="thumbnil2" style="width:300px; margin:10px;"/><br>
                            </div>
                            @else
                            <div class="col-md-5">
                                <img id="thumbnil2" src="/{{ $all_items->itemimage2 }}" style="width:300px; margin:10px;"/><br>
                            </div>
                            @endif
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
                            @if($all_items->itemimage3 == 0)
                            <div class="col-md-5">
                                <img id="thumbnil3" style="width:300px; margin:10px;"/><br>
                            </div>
                            @else
                            <div class="col-md-5">
                                <img id="thumbnil3" src="/{{ $all_items->itemimage3 }}" style="width:300px; margin:10px;"/><br>
                            </div>
                            @endif
                        </div>

                        
                        <br>
                        <hr>
                        <br>
                        <!-- <h1 style="text-indent: 1%;">DESCRIPTION</h1> -->
                        

                        <div class="form-group row">
                            <label for="itemdescription" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-10">

                                <textarea id="itemdescription" type="text" class=" {{ $errors->has('itemdescription') ? ' is-invalid' : '' }}" name="itemdescription" value="">{{$all_items->description }}</textarea>
                                

                                @if ($errors->has('itemdescription'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('itemdescription') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="note" class="col-md-2 col-form-label text-md-right">{{ __('Notes') }}</label>

                            <div class="col-md-10">
                                <textarea id="note" type="text" class=" {{ $errors->has('description') ? ' is-invalid' : '' }}" name="note" value="">{{$all_items->note }}</textarea>

                                @if ($errors->has('note'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-10">
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{$all_items->price }}" autofocus>

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
                                <input id="barcode" type="number" class="form-control{{ $errors->has('barcode') ? ' is-invalid' : '' }}" name="barcode" value="{{$all_items->barcode }}" autofocus>

                                @if ($errors->has('barcode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('barcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-10">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('UPDATE THE ITEM') }}
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

@extends('inventory.itemlayout')
@extends('layouts.app') 

@section('item_content')

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">	
<style>

.gi-2x{font-size: 2em;}
.gi-3x{font-size: 3em;}
.gi-4x{font-size: 4em;}
.gi-5x{font-size: 5em;}

.modal-lg {
    max-width: 80% !important;
}

</style>
</head>
<body>

    <div class="">

      <div class="row">

        
        <!-- /.col-lg-3 -->

        <div class="col-lg-12" style="position:relative; top: -60px;">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>

            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="{{ asset('/css/1a.jpg') }}" alt="First slide" style="height: 250px; width: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <a href='{{url("watches")}}'> 
                  <div class="imageration lobofont">Watches/Jewelries</div>
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('/css/1b.jpeg') }}" alt="Second slide" style="height: 250px; width: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <?php $category="Accessories"; ?>
                  <a href='{{url("category/$category")}}'>  
                  <div class="imageration lobofont">Accessories</div>
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('/css/1c.jpeg') }}" alt="Third slide" style="height: 250px; width: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <?php $category="Bags"; ?>
                  <a href='{{url("category/$category")}}'>  
                  <div class="imageration lobofont">Bags</div>
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('/css/1e.jpeg') }}" alt="Fourth slide" style="height: 250px; width: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <?php $category="Luggages"; ?>
                  <a href='{{url("category/$category")}}'>  
                  <div class="imageration lobofont">Luggages</div>
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('/css/1d.jpeg') }}" alt="Fourth slide" style="height: 250px; width: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <?php $category="Footwears"; ?>
                  <a href='{{url("category/$category")}}'>  
                  <div class="imageration lobofont">Footwears</div>
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('/css/1f.jpg') }}" alt="Fourth slide" style="height: 250px; width: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <?php $category="Wallets"; ?>
                  <a href='{{url("category/$category")}}'>  
                  <div class="imageration lobofont">Wallets</div>
                  </a>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

        
        <div class="col-lg-10 offset-md-1">
          @if(!empty(Session::get('deleted')))

            <div class="alert alert-info">
                <strong>Info! </strong> {{ session('deleted') }}
            </div> 
            
          @endif
          <div class="row">
          	@foreach($all_items as $item)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a data-toggle="modal" data-target="#myModal{{$item->id}}"><img style="height: 350px;" class="card-img-top" src="{{ $item-> itemimage1 }}" alt=""></a>
                <div class="card-body" style="height: 60px;"> 
                  <h4 class="card-title">
                    <a href="#">{{ $item-> name }}</a>
                  </h4>
                </div>
                <div class="card-footer">
                  <small class="text-muted"> {{$item-> brand -> brandname}} </small>
                </div>
              
	            @if (Auth::guard('admin')->check())
	            <a data-toggle="modal" data-target="#deleteModal{{$item->id}}" href='{{url("catalogue/$item->id/delete")}}' class="btn btn-danger btn-md" role="button">Delete</a>
	            <a href='{{url("catalogue/update/$item->id/")}}' class="btn btn-info btn-md" role="button">Update</a>
	            @endif
              </div>
            </div>


             <!-- Modal -->
  			<div class="modal fade container-fluid" id="myModal{{$item->id}}" role="dialog">
			    <div class="modal-dialog modal-lg">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			        @guest
			        @elseif (Auth::user()->role == 'user')
			        <a href='{{url("messages/reserve/$item->id/")}}' class="btn btn-info btn-md" role="button">Reserve</a>
			        @else
			        <a href='{{url("catalogue/update/$item->id/")}}' class="btn btn-info btn-md" role="button">Update</a>
            	@endguest
			          
			        </div>
			        <div class="modal-body row">
			        	<div class="col-lg-4 ">
			        		<img style="width: 300px; height: 350px;" src="{{ $item-> itemimage1 }}" alt="">

			        		@if($item-> itemimage2 != '0')
			        		<br>
			        		<img style="width: 300px; height: 350px;" src="{{ $item-> itemimage2 }}" alt="">
			        		@endif

			        		@if($item-> itemimage3 != '0')
			        		<br>
			        		<img style="width: 300px; height: 350px;" src="{{ $item-> itemimage3 }}" alt="">
			        		@endif
			        	</div>
			        	<div class="col-lg-7 offset-lg-1">
			        		<h2>For as low as: &#8369;{{ $item->price }}</h1>
			        		<hr>
			        		<h3 style="color: #1a1a1a;">{{$item-> brand -> brandname}}</h3>
                  <h3 style="color: #333333;"> <?php echo $item->description; ?> </h3>
                  <hr>
                            
                  <br>
                  <h4 style="color: #4d4d4d;"><?php echo $item->note; ?></h4>
			        		
			        	</div>
			        </div>
			        
			      </div>
			      
			    </div>
			</div>

      <div class="modal fade container-fluid" id="deleteModal{{$item->id}}" role="dialog">
          <div class="modal-dialog modal-lg">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body row">
                <div class=" offset-lg-1 col-lg-8" style="border-right: 1px solid black;">
                  <h3> Are you sure you want to delete the {{ $item->itemname }}?</h3>
                  

                </div>

                <div class="col-lg-1">
                  <a  class="btn btn-info btn-md close" data-dismiss="modal" role="button"><h4><i class="fa fa-window-close"></i></h4></a>
                  

                </div>
                <div class="col-lg-1">
                  <a href='{{url("catalogue/$item->id/delete")}}' class="btn btn-danger btn-md" role="button"><h4><i class="fa fa-trash"></i></h4></a>

                </div>
              </div>
              
            </div>
            
          </div>
      </div>



            @endforeach


          </div>
          <!-- /.row -->
          <center>{{$all_items->links()}}</center>
        </div>
        <!-- /.col-lg-9 -->
        	
      </div>
    </div>



</body>
@endsection

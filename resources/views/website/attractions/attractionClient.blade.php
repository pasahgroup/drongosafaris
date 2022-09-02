@extends('website.layouts.apps')
@section('content')
  <link rel="stylesheet" href="css/style.css">

<style type="text/css">
      
    .bg-banner-front {

    background: url('../img/ava2.jpg');
  
     height: 60%;
    position: relative;
    background-repeat: no-repeat;
    background-size:cover;
}
.bg-banner-front::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.75);
}
</style>

<style type="text/css">
   .wrapper {
  padding: 5px;
   background-color: rgba(0,0,0,0.00001);
  max-width: 100%;
  margin: 2px auto;
}

.demo-1 {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
}
.demo-4 {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}
</style>
<style>
.bg-bannerw{
   @isset($PostcategoryImage->attachment)
  background-image:url({{URL::asset('/storage/uploads/'.$PostcategoryImage->attachment)}});
   @endisset

    position: relative;
    background-repeat: no-repeat;
     background-size:100% 100%;
}
</style>


 @isset($PostcategoryImage->attachment)
   <section class="same-section-spacing bg-bannerw" style="width:100% !important; height:72vh; !important">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="banner-box">
                        <h2>Experience the beauty of Tanzania</h2>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Attractions</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <hr>
 <section class="booking-btn">
    <div class="container-fluid">   
    <div class="row"> 
      <div class="col-lg-12 col-md-12 col-sm-12">
        <p style="color: white;">
          {{$PostcategoryImage->body ?? ''}}.
        </p>         
    </div>
    </div>
    </div>
</section>
 @endisset
<hr>
<section class="bg-gray">
   
          <div class="container-fluid">
          <!-- BEGIN CONTENT -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
            <div class="">
             <div data-aos="fade-up">
                <!-- BEGIN CAROUSEL -->            
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs3 front-carousel booking-tourPadding">
                    <strong>Wildlife</strong>
                                
  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
   
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">

   <div class="booking-btn-top">
    <div class="row">
    <div class="col-md-12">
      @if (isset($wildlife_first->attachment))
      <img src="{{URL::asset('/storage/attraction/'.$wildlife_first->attachment)}}" class="img-fluid" alt="No Image" style="height:140px;width:100%;">
      @endisset
   </div>
 <div class="col-md-12">  
  <div class="card-body wrapper">
      @if (isset($wildlife_first->attraction_description))
    <p class="text-white demo-1">{{$wildlife_first->attraction_description}}.|</p><a href="#" data-toggle="modal" data-target="#view_{{$wildlife_first->id}}" data-id="myModal2">Read More<i class="fas fa-angle-double-right"></i></a>
    @endisset
  </div>
</div>
</div>
</div>
      </div>
 @if (isset($wildlife_first->id))
    <div class="modal fade" id="view_{{$wildlife_first->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title"> {{$wildlife_first->title ?? ''}}</h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <div class="modal-body">
                    <div class="img-wapper">
                           @if (isset($wildlife_first->attachment))
                        <img src="{{URL::asset('/storage/attraction/'.$wildlife_first->attachment) }}" alt="No Image" style="widht:100% !important; height:200px; !important">
                         @endisset
                           
                              </div>
                              <hr>
          <p class="text-primary">{{$wildlife_first->attraction_description ?? ''}}.
                                    </p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>
@endisset
     
     
            @foreach ($wildlife as $wildlife_data) 
                        <div class="item">
      <div class="booking-btn-top">
    <div class="row">
    <div class="col-md-12">
      <img src="{{URL::asset('/storage/attraction/'.$wildlife_data->attachment)}}" class="img-fluid" alt="No Image" style="height:140px;width:100%;">
   </div>
 <div class="col-md-12">
  <div class="card-body wrapper">
    <p class="text-white demo-1">{{$wildlife_data->attraction_description}}.|</p><a href="#" data-toggle="modal" data-target="#view_{{$wildlife_data->id}}" data-id="myModal2">Read More<i class="fas fa-angle-double-right"></i></a>
   
  </div>
</div>
</div>
</div>
    </div>
<!-- Wildlife Modal -->

                       <div class="modal fade" id="view_{{$wildlife_data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">{{$wildlife_data->title}}</h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <div class="modal-body">
                    <div class="img-wapper">
                        <img src="{{URL::asset('/storage/attraction/'.$wildlife_data->attachment) }}" alt="No Image" style="widht:100% !important; height:200px; !important">
                              </div>
                              <hr>
          <p class="text-primary">{{$wildlife_data->attraction_description}}.
                                    </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>
    
    @endforeach    
    </div>

    <!-- Left and right controls -->
  <a data-slide="prev" href="#myCarousel1" class="carousel-control left">
                      <i class="fa fa-angle-left"></i>
                    </a>
                    <a data-slide="next" href="#myCarousel1" class="carousel-control right">
                      <i class="fa fa-angle-right"></i>
                    </a>
  </div>
   </div>


<div class="col-lg-3 col-md-3 col-sm-3 col-xs3 front-carousel booking-tourPadding">
                  <strong>Geographical</strong>
                                
  <div id="myCarousel2" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
     <!--  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li> -->
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
       <div class="booking-btn-top">
    <div class="row">
    <div class="col-md-12">
      @if (isset($geographical_first->attachment))
      <img src="{{URL::asset('/storage/attraction/'.$geographical_first->attachment)}}" class="img-fluid" alt="No Image" style="height:140px;width:100%;">
      @endisset
   </div>
 <div class="col-md-12">  
  <div class="card-body wrapper">
      @if (isset($geographical_first->attraction_description))
    <p class="text-white demo-1">{{$geographical_first->attraction_description}}.|</p><a href="#" data-toggle="modal" data-target="#view_{{$geographical_first->id}}" data-id="myModal2">Read More<i class="fas fa-angle-double-right"></i></a>
    @endisset
  </div>
</div>
</div>
</div>
      </div>

     
    @if (isset($geographical_first->id))
    <div class="modal fade" id="view_{{$geographical_first->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title"> {{$geographical_first->title ?? ''}}</h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <div class="modal-body">
                    <div class="img-wapper">
                           @if (isset($geographical_first->attachment))
                        <img src="{{URL::asset('/storage/attraction/'.$geographical_first->attachment) }}" alt="No Image" style="widht:100% !important; height:200px; !important">
                         @endisset
                           
                              </div>
                              <hr>
          <p class="text-primary">{{$geographical_first->attraction_description ?? ''}}.
                                    </p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>
@endisset
     
             
    @foreach ($geographical as $geographical_data)                      
<div class="item">
      <div class="booking-btn-top">
    <div class="row">
    <div class="col-md-12">
      <img src="{{URL::asset('/storage/attraction/'.$geographical_data->attachment)}}" class="img-fluid" alt="No Image" style="height:140px;width:100%;">
   </div>
 <div class="col-md-12">
  <div class="card-body wrapper">
    <p class="text-white demo-1">{{$geographical_data->attraction_description}}.|</p><a href="#" data-toggle="modal" data-target="#view_{{$geographical_data->id}}" data-id="myModal2">Read More<i class="fas fa-angle-double-right"></i></a>
   
  </div>
</div>
</div>
</div>
    </div>
<!-- Wildlife Modal -->

                       <div class="modal fade" id="view_{{$geographical_data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">{{$geographical_data->attraction_title}}</h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <div class="modal-body">
                    <div class="img-wapper">
                        <img src="{{URL::asset('/storage/attraction/'.$geographical_data->attachment) }}" alt="No Image" style="widht:100% !important; height:200px; !important">
                              </div>
                              <hr>
          <p class="text-primary">{{$geographical_data->attraction_description}}.
                                    </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>
    
    @endforeach     
    </div>

    <a data-slide="prev" href="#myCarousel2" class="carousel-control left">
                      <i class="fa fa-angle-left"></i>
                    </a>
                    <a data-slide="next" href="#myCarousel2" class="carousel-control right">
                      <i class="fa fa-angle-right"></i>
                    </a>
  </div>
   </div>


<div class="col-lg-3 col-md-3 col-sm-3 col-xs3 front-carousel booking-tourPadding">
                  <strong>Historical</strong>
                                
  <div id="myCarousel3" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
     <!--  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li> -->
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
       <div class="booking-btn-top">
    <div class="row">
    <div class="col-md-12">
      @if (isset($historical_first->attachment))
      <img src="{{URL::asset('/storage/attraction/'.$historical_first->attachment)}}" class="img-fluid" alt="No Image" style="height:140px;width:100%;">
      @endisset
   </div>
 <div class="col-md-12">  
  <div class="card-body wrapper">
      @if (isset($historical_first->attraction_description))
    <p class="text-white demo-1">{{$historical_first->attraction_description}}.|</p><a href="#" data-toggle="modal" data-target="#view_{{$historical_first->id}}" data-id="myModal2">Read More<i class="fas fa-angle-double-right"></i></a>
    @endisset
  </div>
</div>
</div>
</div>
      </div>

     
    @if (isset($historical_first->id))
    <div class="modal fade" id="view_{{$historical_first->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title"> {{$historical_first->title ?? ''}}</h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <div class="modal-body">
                    <div class="img-wapper">
                           @if (isset($historical_first->attachment))
                        <img src="{{URL::asset('/storage/attraction/'.$historical_first->attachment) }}" alt="No Image" style="widht:100% !important; height:200px; !important">
                         @endisset
                           
                              </div>
                              <hr>
          <p class="text-primary">{{$historical_first->attraction_description ?? ''}}.
                                    </p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>
@endisset
     
             
    @foreach ($historical as $historical_data)                      
<div class="item">
      <div class="booking-btn-top">
    <div class="row">
    <div class="col-md-12">
      <img src="{{URL::asset('/storage/attraction/'.$historical_data->attachment)}}" class="img-fluid" alt="No Image" style="height:140px;width:100%;">
   </div>
 <div class="col-md-12">
  <div class="card-body wrapper">
    <p class="text-white demo-1">{{$historical_data->attraction_description}}.|</p><a href="#" data-toggle="modal" data-target="#view_{{$historical_data->id}}" data-id="myModal2">Read More<i class="fas fa-angle-double-right"></i></a>
   
  </div>
</div>
</div>
</div>
    </div>
<!-- Wildlife Modal -->

                       <div class="modal fade" id="view_{{$historical_data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">{{$historical_data->attraction_title}}</h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <div class="modal-body">
                    <div class="img-wapper">
                        <img src="{{URL::asset('/storage/attraction/'.$historical_data->attachment) }}" alt="No Image" style="widht:100% !important; height:200px; !important">
                              </div>
                              <hr>
          <p class="text-primary">{{$historical_data->attraction_description}}.
                                    </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>
    
    @endforeach     
    </div>

    <a data-slide="prev" href="#myCarousel3" class="carousel-control left">
                      <i class="fa fa-angle-left"></i>
                    </a>
                    <a data-slide="next" href="#myCarousel3" class="carousel-control right">
                      <i class="fa fa-angle-right"></i>
                    </a>
  </div>
   </div>


<div class="col-lg-3 col-md-3 col-sm-3 col-xs3 front-carousel booking-tourPadding">
                  <strong>Culture & Belief</strong>
                                
  <div id="myCarousel4" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
     <!--  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li> -->
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
       <div class="booking-btn-top">
    <div class="row">
    <div class="col-md-12">
      @if (isset($culture_first->attachment))
      <img src="{{URL::asset('/storage/attraction/'.$culture_first->attachment)}}" class="img-fluid" alt="No Image" style="height:140px;width:100%;">
      @endisset
   </div>
 <div class="col-md-12">  
  <div class="card-body wrapper">
      @if (isset($culture_first->attraction_description))
    <p class="text-white demo-1">{{$culture_first->attraction_description}}.|</p><a href="#" data-toggle="modal" data-target="#view_{{$culture_first->id}}" data-id="myModal2">Read More<i class="fas fa-angle-double-right"></i></a>
    @endisset
  </div>
</div>
</div>
</div>
      </div>

     
    @if (isset($culture_first->id))
    <div class="modal fade" id="view_{{$culture_first->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title"> {{$culture_first->title ?? ''}}</h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <div class="modal-body">
                    <div class="img-wapper">
                           @if (isset($culture_first->attachment))
                        <img src="{{URL::asset('/storage/attraction/'.$culture_first->attachment) }}" alt="No Image" style="widht:100% !important; height:200px; !important">
                         @endisset
                           
                              </div>
                              <hr>
          <p class="text-primary">{{$culture_first->attraction_description ?? ''}}.
                                    </p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>
@endisset
     
             
    @foreach ($culture as $culture_data)                      
<div class="item">
      <div class="booking-btn-top">
    <div class="row">
    <div class="col-md-12">
      <img src="{{URL::asset('/storage/attraction/'.$culture_data->attachment)}}" class="img-fluid" alt="No Image" style="height:140px;width:100%;">
   </div>
 <div class="col-md-12">
  <div class="card-body wrapper">
    <p class="text-white demo-1">{{$culture_data->attraction_description}}.|</p><a href="#" data-toggle="modal" data-target="#view_{{$culture_data->id}}" data-id="myModal2">Read More<i class="fas fa-angle-double-right"></i></a>
   
  </div>
</div>
</div>
</div>
    </div>
<!-- Wildlife Modal -->

                       <div class="modal fade" id="view_{{$culture_data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">{{$culture_data->attraction_title}}</h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <div class="modal-body">
                    <div class="img-wapper">
                        <img src="{{URL::asset('/storage/attraction/'.$culture_data->attachment) }}" alt="No Image" style="widht:100% !important; height:200px; !important">
                              </div>
                              <hr>
          <p class="text-primary">{{$culture_data->attraction_description}}.
                                    </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>
    
    @endforeach     
    </div>

    <a data-slide="prev" href="#myCarousel4" class="carousel-control left">
                      <i class="fa fa-angle-left"></i>
                    </a>
                    <a data-slide="next" href="#myCarousel4" class="carousel-control right">
                      <i class="fa fa-angle-right"></i>
                    </a>
  </div>
   </div>



</div>
</div>
</div>

    </div> 
    <hr>
     <div class="container-fluid">
    <div class="row"> 
      @foreach ($datas as $safaris )
      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="package-one blog-box">                    
                    <div class="img-wapper">
                        <img src="{{URL::asset('/storage/attraction/'.$safaris->attachment) }}" alt="{{  $safaris->tour_name }}" style="width:100% !important; height:50vh; !important">
                              </div>
                                <div class="package-content">
                                    <h3>{{$safaris->attraction_title}}</h3>
                                   <hr>
                                    <p class="text-primary demo-1">{{$safaris->attraction_description}}.
                                    </p>
                                </div>
                                <p class="text-center">
                                <a href="#" class="read-btn" data-toggle="modal" data-target="#view_{{$safaris->id}}" data-id="myModal2">Read More<i class="fas fa-angle-double-right"></i></a>
                             </p>
                            </div>
                            </div> 

  <!-- Modal -->  
 <div class="modal fade" id="view_{{$safaris->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title"> {{$safaris->attraction_title}}</h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <div class="modal-body">
                    <div class="img-wapper">
                        <img src="{{URL::asset('/storage/attraction/'.$safaris->attachment) }}" alt="{{  $safaris->tour_name }}" style="widht:100% !important; height:200px; !important">
                              </div>
                              <hr>
          <p class="text-primary">{{$safaris->attraction_description}}.
                                    </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>
        @endforeach
                     
       </div>
    </div>
</section>
<!-- End-Package-Section -->

@endsection


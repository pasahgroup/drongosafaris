@extends('website.layouts.apps')
@section('content')
<!--<link rel="stylesheet" href="css/style.css">-->

<style>
.vl {
  border-left: 1px solid green;
  height: 10px;
}
</style>

<style type="text/css">
   .wrapper {
  padding: 0px;
   background-color: rgba(0,0,0,0.00001);
  max-width: 100%;
  margin: 1px auto;
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
  <link rel="stylesheet" href="../../css/style.css">
<section>
        <div class="container-fluid">
            <div class="row">
        <div class="col-md-12 text-center">
              <h2 style="background-color:gray;" class="booking-btn booking-tourPadding">{{$circuit_name}} Tours</h2>
              <hr>
        </div>
                    <div class="col-lg-12 text-center">                    
                       <h4 class=""><b>Group Tours</b></h4>
                </div>
            </div>
            <div class="row small-package-list">
               @foreach ($circuitTour as $circuit)
               @if($circuit->category=='Group')
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="single_package booking-btn">
                    
                        <div class="media">
                       
                          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style=" background-image:url({{URL::asset('/storage/uploads/'.$circuit->attachment)}}); background-repeat: no-repeat;
                            background-size:100% 95%;height:35vh !important;">  
                         
                        </div>
                        <!--<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">-->
                        <!--<div class="vl"></div>-->
                        <!-- </div>-->

                         <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                            <div class="media-body">  
                              <span class="direction"><i class="fas fa-map-marker-alt"></i><b> {{$circuit->tour_name}} </b>| {{$circuit->type}} | {{$circuit->style}}| {{$circuit->category}}</span>      
                                  
                                                                 <div class="wrapper">
    <p class="text-success demo-1"> <i>{{$circuit->tour_highlight}}</i></p><a href="#" data-toggle="modal" data-target="#view_{{$circuit->id}}" data-id="myModal1"><b class="text-danger">Read More<i class="fas fa-angle-double-right"></i></b></a>
   
  </div>
                                <div class="duration booking-btn-gray">                                   
                                      <ul>
                                        <li>
                                            <p> <i class="far fa-clock"></i> Duration</p>
                                             <p style=" margin-top:4px;"><b>{{ $circuit->days }} Days, {{ $circuit->days -1 }} Nights</b></p>
                                        </li>
                                        <li>
                                            <p> <i class="fas fa-tags"></i> From</p>
                                            <p>${{ number_format($circuit->price),2 }}</p>
                                        </li>
                                                                              <li>
                                            <p> <i class="fas fa-tags"></i>Tour Code</p>
                                            <p>{{ $circuit->tour_code }}</p>
                                        </li>
                                    </ul>
                                </div>
                              
                                   <a href="{{ route('grouptour.show',$circuit->id) }}" class="btn btn-primary">Explore More</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div> 
                
                
                 <!-- Wildlife Modal -->

                       <div class="modal fade" id="view_{{$circuit->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">{{$circuit->tour_name}}</h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <div class="modal-body">
                    <div class="img-wapper">
                        <img src="{{URL::asset('/storage/uploads/'.$circuit->attachment) }}" alt="No Image" style="widht:100% !important; height:200px; !important">
                              </div>
                              <hr>
          <p class="text-primary">{{$circuit->tour_highlight}}.
                                    </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>
                  @endif           
         @endforeach
            
            </div>
       </div>
    </section>
<hr><hr>

<section>
        <div class="container-fluid">
            <div class="row">                        
                          <div class="col-lg-12 text-center">                    
                      <h3 class=""><b>Private Tours</b></h3>
                </div>
                   
            </div>
            <div class="row small-package-list">
                 @foreach ($circuitTourPrivate as $circuit_private)
               @if($circuit_private->category=='Private')
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="single_package booking-btn">
                    
                        <div class="media">
                          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style=" background-image:url({{URL::asset('/storage/uploads/'.$circuit_private->attachment)}}); background-repeat: no-repeat;
                            background-size:100% 95%;height: 35vh !important;">  
                           <vr>
                        </div>
                        <!--<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">-->
                        <!--<div class="vl"></div>-->
                        <!-- </div>-->

                         <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                            <div class="media-body">  
                              <span class="direction booking-btn"><i class="fas fa-map-marker-alt"></i><b> {{$circuit_private->tour_name}} </b>| {{$circuit_private->type}} | {{$circuit_private->style}}| {{$circuit_private->category}} </span>              
                                 
                                  <div class="wrapper">
    <p class="text-success demo-1"> <i>{{$circuit_private->tour_highlight}}</i></p><a href="#" data-toggle="modal" data-target="#view_{{$circuit_private->id}}" data-id="myModal2"><b class="text-danger">Read More<i class="fas fa-angle-double-right"></i></b></a>
   
  </div>
                                  
                                  
                                <div class="duration booking-btn-gray">                                   
                                      <ul>
                                        <li>
                                            <p> <i class="far fa-clock"></i> Duration</p>
                                             <p style="margin-top:4px;"><b style="font-color:black">{{ $circuit_private->days }} Days, {{ $circuit_private->days -1 }} Nights</b></p>
                                        </li>
                                        <li>
                                            <p> <i class="fas fa-tags"></i> From</p>
                                            <p>${{ number_format($circuit_private->price),2 }}</p>
                                        </li>
                                                                              <li>
                                            <p> <i class="fas fa-tags"></i>Tour Code</p>
                                            <p>{{ $circuit_private->tour_code }}</p>
                                        </li>
                                    </ul>
                                </div>
                              
                                   <a href="{{ route('safaris.show',$circuit_private->id) }}" class="btn btn-primary">Explore More</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div> 
                
                
                <!-- Wildlife Modal -->

                       <div class="modal fade" id="view_{{$circuit_private->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">{{$circuit_private->tour_name}}</h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <div class="modal-body">
                    <div class="img-wapper">
                        <img src="{{URL::asset('/storage/uploads/'.$circuit_private->attachment) }}" alt="No Image" style="widht:100% !important; height:200px; !important">
                              </div>
                              <hr>
          <p class="text-primary">{{$circuit_private->tour_highlight}}.
                                    </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>
                  @endif           
         @endforeach
            
            </div>
       </div>
    </section> 
@endsection

@extends('website.layouts.apps')
@section('content')

 <!-- Start-Package-Section -->
 <section class="text-center bg-white">
    <div>
        <h2>{{$sliders->tour_name}}</h2>
    </div>
 </section>


    <section class="ws-section-spacing bg-gray">
    <div class="container-fluid">
          <!-- Start of Image filled from slider -->
             <div class="package-list-wrap ">
                 <img src="{{URL::asset('/storage/uploads/'.$sliders->attachment) }}" class="" alt="det-img" style="min-height: 35vh !important;max-height:75vh !important;background-size:100% 100%;width: 100%;">
                 
                <div class="package-list-content">
                    <p class="package-list-duration"> <span
                            class="">{{$sliders->title}}
                            </span>
                                
                    </p>
                    <h3 class="package-list-title">
                        <a href="#"></a>
                    </h3>
                    <a role="button" class="btn btn-primary text-center" href="{{ route('safaris.show',$sliders->tour_id) }}">Acquire</a>                    
                </div>
                </div> 
                
                                 <hr>
 <section class="ws-section-spacing booking-btn">
    <div class="container-fluid">   
    <div class=""> 
      <div class="col-lg-12 col-md-12 col-sm-12">
        <p style="color: white;">
          {{$sliders->description ?? ''}}.
        </p>         
    </div>
    </div>
    </div>
</section>
</br>
      <!-- End of Image filled from slider -->
     
      
        <div class="masonry-item">
            <div class="row">
            <div class="col-md-12" data-aos="fade-up">
                 
                  <div class="col-md-12 text-center">
         <h3 style="background-color:gray;" class="text-white  booking-btn booking-tourPadding">More {{$title}}</b></h3>
                    </div>
            </div>
        </div>
            <!-- item -->
            <div class="row" data-aos="fade-up"> 
            @foreach ($safaris as $safari)
                 <div class="col-lg-4 col-md-4">
                        <div class="single_blog listing-shot">                         
                               
                                <div class="listing-shot-img">
                                    <div class="blog_image">
                                    <img src="{{URL::asset('/storage/uploads/'.$safari->attachment) }}" class="img-responsive" alt="{{  $safari->tour_name }}" style="height:250px;width:100%;">
                                    </div>
                                </div>
                                <div class="">
                                 <h3 class="text-center"> <b style="color:">{{$safari->tour_name}}</b>
                                    </h3>
                                </div>
                               
                            <div class="blog-text">       
                            <div class="row">                                                          
                                    <div class="col-md-6 col-sm-12 col-xs-6 booking-btn" style="border-right:1px solid rgba(71,85,95,.11);font-size:18px;">
                                             <strong>{{ $safari->days }} Days, {{ $safari->days -1 }} Nights</strong>
                                        </div>                                           
                                        <div class="col-md-6 col-sm-12 col-xs-6 booking-btn" style="font-size:18px;">
                                        <span class="text-white"><strong>From ${{number_format($safari->price),2 }}</b>  </strong>
                                           </span>

                                         </div> 
                                    </div> 
                                    
                                      <div class="col-md-12 col-sm-12 col-xs-12 text-left booking-btn-gray">
                                      
                                    
                                               <div class="row">                                            
                                              <div class="col-md-6 col-sm-6 col-xs-6" style="border-right:1px solid rgba(255,255,0,.5);font-size:17px;">
                                                   <strong>Physical Rating:</strong>
                                                </div>                                          

                                               <div class="col-md-5 col-sm-5 col-xs-5" style="font-size:17px;">
                                                   <strong>{{ $safari->physical_rating }}</strong>
                                                </div>
                                               </div>
                                                <div class="row">
                                                                                             
                                              <div class="col-md-6 col-sm-6 col-xs-6" style="border-right:1px solid rgba(255,255,0,.5);font-size:17px;">
                                                   <strong>Tour Category:</strong>
                                                </div>  
                            
                                           
                                               <div class="col-md-6 col-sm-6 col-xs-6" style="font-size:17px;">
                                                   <strong>{{ $safari->category }}</strong>
                                                </div>  
                                            </div>  
                                                  <div class="row">
                                               <div class="col-md-6 col-sm-6 col-xs-6" style="border-right:1px solid rgba(255,255,0,.5);font-size:17px;">
                                                   <strong>Tour Code:</strong>
                                                </div> 
                          
                                               <div class="col-md-6 col-sm-6 col-xs-6" style="font-size:17px;">
                                                   <strong>{{ $safari->tour_code }}</strong>
                                                </div>  
                                            </div>                                           
                                             </div>
                               
                                  <div class="row">
                                  <div class="col-md-12 col-sm-12 col-xs-12 text-right booking-btn booking-tourPadding">
                                    <div class="">
                                        <a href="{{ route('safaris.show',$safari->id) }}" class="booking-btn-green neon text-center"><b>View More</b></a>
                                    </div>  
                                      </div>  
                                      </div>                         
                                </div>
                          
                        </div>
                    </div>                 
            @endforeach
        </div>
</div>
    </div>
</section>
<!-- End-Package-Section -->
@endsection
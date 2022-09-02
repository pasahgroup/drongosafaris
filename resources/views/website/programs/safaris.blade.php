@extends('website.layouts.apps')
@section('content')

 <!-- Start-Package-Section -->

<style>

.bg-bannerw{  
  @isset($PostcategoryImage->attachment)
  background-image:url({{URL::asset('/storage/uploads/'.$PostcategoryImage->attachment)}});
   @endisset

  /* height: 65vh;
    position: relative;
    background-repeat: no-repeat;
    background-size:cover;*/

    background-size:100% 100%;
     background-repeat: no-repeat;
                         background-size: cover;
                       background-position: center; 
                         position: relative;
}
</style>
<style>
.vl {
  border-left: 1px solid white;
  height: 20px;
}
</style>

 @isset($PostcategoryImage->attachment)
 
  <section class="package-list-wrap">
                            <img src="{{URL::asset('/storage/uploads/'.$PostcategoryImage->attachment) }}" class="" alt="det-img" style="min-height: 35vh !important;max-height:80vh !important;background-size:100% 100%;width: 100%;">
                        
                            <div class="package-list-content">
                                <p class="package-list-duration"   <div class="banner-box">
                        <h3 style="font-style;color:white">{{$title}}</h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">{{$title?? ''}}</li>
                            </ul>
                        </nav>
                    </div>
                    </div>
              
  </section>
   <hr>
 <section class="ws-section-spacing booking-btn">
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
</hr>
@else
 <div class="row">
                <div class="col-lg-10">
                    <div class="banner-box">
                        <h2>{{$title}}</h2>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$title?? ''}}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
 @endisset
<hr>


 <section id="blog_private" class="">
    <div class="container-fluid">    
               

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
                                        <div class="col-md-6 col-sm-6 col-xs-6 booking-btn" style="border-right:1px solid rgba(71,85,95,.11);font-size:18px;">
                                             <strong><b class="text-white">{{ $safari->days }} Days, {{ $safari->days -1 }} Nights</b></strong> 
                                         </div> 
                                         
                                        <div class="col-md-6 col-sm-12 col-xs-6 booking-btn" style="font-size:18px;">
                                        <span class="text-white"><strong>From ${{number_format($safari->price),2 }}</b>  </strong>
                                           </span>

                                         </div> 
                                    </div> 
                                    
                                      <div class="col-md-12 col-sm-12 col-xs-12 text-left booking-btn-gray">
                                      
                                      <div class="row">
                                           <div class="col-md-6 col-sm-6 col-xs-6"  style="border-right:1px solid rgba(255,255,0,.5)">
                                             Tour Duration:
                                            </div>
                      
                                               <div class="col-md-6 col-sm-6 col-xs-6" style="font-size:17px;">
                                                   <strong>{{ $safari->days }} Days, {{ $safari->days -1 }} Nights</strong>
                                                </div>
                                             </div>

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
                                                  <div class="col-md-6 col-sm-6 col-xs-6" style="border-right:1px solid rgba(255,255,0,.5)">
                                               <span> Tour Code: </span>  
                                           </div>
                          
                                               <div class="col-md-6 col-sm-6 col-xs-6" style="font-size:17px;">
                                                   <strong>{{ $safari->tour_code }}</strong>
                                                </div>  
                                            </div>                                           
                                             </div>
                               
                                  <div class="row">
                                  <div class="col-md-12 col-sm-12 col-xs-12 text-right booking-tourPadding">
                                    <div class="">
                                        <a href="/safaris/{{$safari->id}}" class="booking-btn neon text-center"><b>View More</b></a>
                                    </div>  
                                      </div>  
                                      </div>                         
                                </div>
                          
                        </div>
                    </div>              
                @endforeach            
              </div>         
 @endsection


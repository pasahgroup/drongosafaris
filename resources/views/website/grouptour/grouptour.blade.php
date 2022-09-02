@extends('website.layouts.apps')
@section('content')

<!-- <style>
.bg-bannerw{
  background-image: url("../img/ava2.jpg");
   height:80%;
    position: relative;
    background-repeat: no-repeat;
    background-size:cover;
}
</style>
 -->

<style>
.bg-bannerw{
     @isset($PostcategoryImage->attachment)
  background-image:url({{URL::asset('/storage/uploads/'.$PostcategoryImage->attachment)}});
     @endisset
     
   height: 75%;
    position: relative;
    background-repeat: no-repeat;
    background-size:cover;
}
</style>

 <section class="same-section-spacing bg-bannerw">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="banner-box">
                        <h2>{{$tour_category}}</h2>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$tour_category}}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


<section class="ws-section-spacing bg-gray">
    <div class="container">   
    <div class="row"> 
      <div class="col-lg-12 col-md-12 col-sm-12">
        <p><b>
            @isset($PostcategoryImage->body)
          {{$PostcategoryImage->body}}.
         @endisset
        </b>
        </p>
         
    </div>
       </div>
    </div>
</section>
</hr>

<section id="blog_private" class="blog_section">
    <div class="container-fluid">       
               

<div class="row" data-aos="fade-up">  
  @foreach ($programs as $program)  
                    <div class="col-lg-4 col-md-4">
                        <div class="single_blog listing-shot">                         
                               
                                <div class="listing-shot-img">
                                    <div class="blog_image">
                                    <img src="{{URL::asset('/storage/uploads/'.$program->attachment) }}" class="img-responsive" alt="{{  $program->tour_name }}" style="height:250px;width:100%;">
                                    </div>
                                </div>
                                <div class="btn booking-btn-gray">
                                 <h3 class="text-center"> <b style="color:">{{$program->tour_name}}</b>
                                    </h3>
                                </div>
                               
                            <div class="blog-text">       
                            <div class="row">                                                            
                                     <div class="col-md-6 col-sm-6 col-xs-6 booking-btn" style="border-right:1px solid rgba(71,85,95,.11) ">
                                             <strong>Valid: <b class="text-white">{{ $program->end_date }}</b></strong> 
                                    </div>                                            
                                       
                                        <div class="col-md-6 col-sm-6 col-xs-6 booking-btn">
                                        <span class="text-white"><strong>From ${{ $program->price }}</b>  </strong>
                                           </span>

                                         </div> 
                                    </div> 
                                                                                                                               
                                      <div class="col-md-12 col-sm-12 col-xs-12 text-left booking-btn-gray">
                                      
                                      <div class="row">
                                           <div class="col-md-6 col-sm-6 col-xs-6"  style="border-right:1px solid rgba(255,255,0,.5)">
                                             Tour Duration:
                                            </div>
                      
                                               <div class="col-md-6 col-sm-6 col-xs-6" style="font-size:14px;">
                                                   <strong>{{ $program->days }} Days, {{ $program->days -1 }} Nights</strong>
                                                </div>
                                             </div>

                                               <div class="row">
                                               <div class="col-md-6 col-sm-6 col-xs-6"  style="border-right:1px solid rgba(255,255,0,.5)">
                                               <span> Physical Rating: </span>  
                                             </div>
                                           
                                                          
                                               <div class="col-md-5 col-sm-5 col-xs-5" style="font-size:14px;">
                                                   <strong>{{ $program->physical_rating }}</strong>
                                                </div>
                                               </div>
                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-6" style="border-right:1px solid rgba(255,255,0,.5)">
                                               <span> Tour Category: </span>  
                                           </div>
                            
                                           
                                               <div class="col-md-6 col-sm-6 col-xs-6" style="font-size:14px;">
                                                   <strong>{{ $program->category }}-Join</strong>
                                                </div>  
                                            </div>  
                                                  <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-6" style="border-right:1px solid rgba(255,255,0,.5)">
                                               <span> Tour Code: </span>  
                                           </div>
                          
                                               <div class="col-md-6 col-sm-6 col-xs-6" style="font-size:14px;">
                                                   <strong>{{ $program->tour_code }}</strong>
                                                </div>  
                                            </div>                                           
                                             </div>
                               
                                                                   
                                 <div class="row">                                      
                                      </div>
                                       <hr>
                            <div class="listing-shot-info rating">
                                <div class="row  booking-tourPadding booking-btn">
                                   
                                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                                       <a href="{{route('grouptour.show',$program->id)}}" class="btn booking-btn-green">Book Now</a>
                                    </div>                                     
                                </div>
                            </div>                          
                                </div>
                          
                        </div>
                    </div>              
                @endforeach            
              </div>

          </div>
 </section>
@endsection


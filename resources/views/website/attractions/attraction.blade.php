@extends('website.layouts.apps')
@section('content')


<style type="text/css">
      
    .bg-banner-front {

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
<style>
.bg-bannerw{
   @isset($PostcategoryImage->attachment)
  background-image:url({{URL::asset('/storage/uploads/'.$PostcategoryImage->attachment)}});
   @endisset

   height: 80%;
    position: relative;
    background-repeat: no-repeat;
    background-size:cover;
}
</style>

 @isset($PostcategoryImage->attachment)
   <section class="same-section-spacing bg-bannerw">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="banner-box">
                        <h2>{{$title}}</h2>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">What We Offer</li>
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
          {{$PostcategoryImage->body}}.
        </b>
        </p>         
    </div>
       </div>
    </div>
</section>
 @endisset
</hr>

<section class="ws-section-spacing bg-gray">
    <div class="container">   
    <div class="row"> 
      @foreach ($attractions as $safaris )
      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="package-one blog-box">                    
                    <div class="img-wapper">
                        <img src="{{URL::asset('/storage/uploads/'.$safaris->attachment) }}" alt="{{  $safaris->tour_name }}" style="widht:100% !important; height:200px; !important">
                              </div>
                                <div class="package-content">
                                    <h3>{{$safaris->attraction_title}}</h3>
                                   <hr>
                                    <p>{{$safaris->attraction_description}}.
                                    </p>
                                </div>
                                <p class="text-center">
                                <a href="/Attraction-Summary/{{$safaris->id}}" class="read-btn" >Read More<i class="fas fa-angle-double-right"></i></a>
                             </p>
                            </div>
                            </div> 

                @endforeach
                     
       </div>
    </div>
</section>
<!-- End-Package-Section -->

@endsection


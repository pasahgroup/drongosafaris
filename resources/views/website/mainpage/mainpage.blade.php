@extends('website.layouts.apps')
@section('content')


<style type="text/css">
      
    .bg-banner-front {

      background-image:url({{URL::asset('/storage/uploads/'.$pages->attachment)}});

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
  background-image:url({{URL::asset('/storage/uploads/'.$pages->attachment)}});
   height: 80%;
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
                        <h2>What We Offer</h2>
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
          {{$pages->page_title}}.
        </b>
        </p>
         
    </div>
       </div>
    </div>
</section>
</hr>

<section class="ws-section-spacing bg-gray">
    <div class="container">   
    <div class="row"> 
 <div class="col-12">
                    <div class="package-detail">
                        @foreach($widgets as $widget)
                        <div class="col-lg-12">
                            <div class="package-info">
                                <h3>{{$widget->widget_name}}</h3>
                                <p>{{$widget->widget_descriptions}} </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                         </div>   
                    </div>
                </div>
                     
       </div>
    </div>
</section>
<!-- End-Package-Section -->
@endsection
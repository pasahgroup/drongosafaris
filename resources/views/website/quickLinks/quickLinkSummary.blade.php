@extends('website.layouts.apps')
@section('content')

  <section class="bg-gray ">
        <div class="container-fluid">
            <div class="package-list-wrap ">
          
             <img src="{{URL::asset('/storage/uploads/'.$quickLinks->attachment) }}" class="" alt="det-img" style="min-height: 35vh !important;max-height:100% !important;background-size: 100% 100%;width: 100%;">
             
                <div class="package-list-content">
                  <span>Home/Quick-Link </span>
                                     <h3 class="package-list-title">
                        <a href="#"><b style="color: white;">{{ $quickLinks->quick_title }}</b></a>
                    </h3>
                </div>
                      </div>

           </div>

        </div>
    </div>
    </section>

<hr>
 <section class="ws-section-spacing booking-btn">
    <div class="container-fluid">   
    <div class=""> 
      <div class="col-lg-12 col-md-12 col-sm-12">
        <p style="color: white;">
          {{$quickLinks->quick_description ?? ''}}.
        </p>         
    </div>
    </div>
    </div>
</section>
</hr>
@endsection


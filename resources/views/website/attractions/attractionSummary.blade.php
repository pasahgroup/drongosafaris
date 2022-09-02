@extends('website.layouts.apps')
@section('content')

  <section class="bg-gray ">
        <div class="container">
            <div class="package-list-wrap ">
                <img src="{{URL::asset('/storage/uploads/'.$attractions->attachment) }}" class="img-fluid" alt="det-img" style="height:400px !important">
                <div class="package-list-content">
                  <span>{{$attractions->tour_circuit}}/{{$attractions->attraction_title}} </span>
                                     <h4 class="package-list-title">
                        <a href="#">{{ $attractions->attraction_title }}</a>
                    </h4>
                </div>
                      </div>

           </div>

        </div>
    </div>
    </section>


<section class="ws-section-spacing bg-gray">
    <div class="container">   
    <div class="row"> 
      <div class="col-lg-12 col-md-12 col-sm-12">
        <p>
          {{$attractions->attraction_description}}.        
        </p>
         
    </div>
       </div>
    </div>
</section>
<hr>
@endsection


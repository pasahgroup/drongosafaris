@extends('website.layouts.apps')
@section('content')

 <!-- Start-Package-Section -->
 <section class="text-center">
    <div>
        <h2>Wildlife Safaris</h2>
    </div>
 </section>
    <section class="ws-section-spacing bg-gray">
    <div class="container">
        <div class="row masonry-item">
            <!-- item -->
            @foreach ($safaris as $safari)
            <a class="" href="{{ route('tour.show',$safari->id) }}">
            <div class="col-lg-4 col-md-6 col-sm-12 masonry">

                <div class="package-one">
                    <div class="img-wapper">
                        <img src="{{URL::asset('/storage/uploads/'.$safari->attachment) }}" alt="{{  $safari->tour_name }}" style="widht:100% !important; height:200px; !important">
                    </div>
                    <div class="package-content">
                        <h3><a href="#">{{ $safari->tour_name }}</a></h3>
                        <p>{{ $safari->days }} Days, {{ $safari->days -1 }} Nights Start From <span>${{ number_format($safari->price) }}</span></p>
                        <ul class="ct-action">
                            <li><a href="{{ route('tour.show',$safari->id) }}" class="booking-btn">Book Now</a>
                            </li>
                            <li>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </a>
            @endforeach
            <!-- item -->
        </div>
    </div>
</section>
<!-- End-Package-Section -->

@endsection


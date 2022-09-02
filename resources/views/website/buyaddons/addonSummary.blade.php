@extends('website.layouts.apps')
@section('content')
 <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: green;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 8px 10px;
  font-size: 17px;
  width: 20%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: black;
  display: none;
  padding: 30px 10px;
  height: 100%;
}
</style>


  <section class="">
        <div class="container">              

            <div class="row masonry-item">
              <div class="col-lg-12 col-md-12 col-sm-12 masonry">

                     <div class="package-list-wrap ">
                            <img src="{{URL::asset('/storage/uploads/'.$programs->attachment) }}" class="img-fluid" alt="det-img" style="min-height: 20vh !important;max-height: 75vh !important;background-size: cover;width: 100%;">
                            <div class="package-list-content">
                                <p class="package-list-duration">{{$programs->days}} Days, {{$programs->days -1}} Nights 
                                </p>
                                <h3 class="package-list-title">
                                    {{ $programs->addon_name }}
                                </h3>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bookNow">Book Now</button>
                            </div>
                        <span class="off-box">FROM US $ {{ $programs->price }}</span>
                      </div>

      
                    <div class="package-detail">
                        <div class="row m-0">
                           <div class="col-lg-8">

                                            <p class="card-text"><h4>Summary:
                                                {{ $programs->itinerary_summury }}</h4>
                                            </p>
                                            @foreach ($datas as $data)
                                            <div class="card card-primary card-outline booking-tourPadding">
                                                <div class="card-header booking-tourPadding booking-btn-gray">
                                                <span><b> Day {{ $data->day }} - {{ $data->itinerary_title }}</b></span>
                                                </div>
                                                <div class="card-body">

                                                {{-- test --}}

                                                <div class="row masonry-item">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 masonry">
                                       <div class="">

                                <div class="row ">
                                <div class="col-lg-7">
                                <div class="hotel-diss">

                               <p class="booking-btn-gray">{{ $data->itinerary_description }}</p>                                 <hr>                                         <div class="row">                                       
                                <div class="col-md-6 col-lg-6 col-sm-12">  
                                <div class="rating">                                                                                                                             
                                 <h4> Destination</h4>              
                                 </div>                                                                  <a class="map-viw" href="#"><i class="fa fa-map-marker"></i> {{ $data->destination_name }}</a>                                                                                   </div>                        
                            <div class="col-md-6 col-lg-6 col-sm-12">                                                                   <div class="rating">                                                                          <h4>Accommodation</h4>                                                                        </div>                                                                        <a class="map-viw" href="#"><i class="fa fa-home"></i> {{ $data->accommodation_name }}</a>                                              </div>
                                                  </div>
                                                 </div>
                                               </div>
                                        <div class="col-lg-5">                           <div class="hotel-pics-one">                                                <img src="{{URL::asset('/storage/uploads/'.$data->attachment) }}" alt="" style="min-height: 20vh !important;max-height: 80vh !important;width:100%">                                                                        </div>                                                  </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                {{-- test --}}
                                            </div>
                                            </div>
                                            @endforeach
                                              </div>
                                           <div class="col-lg-4">
                           <h3 class="package-list-title">
                                    <a href="#">{{ $programs->addon_name }}</a>
                                </h3>
                                <hr>
                    @foreach ($addonscosts as $costs)        
                          <p>Accommodation Level: 
                              <b>{{ $costs->style }}</b></p>
                            <p>Price per Person: <b>{{ $costs->price }} {{ $costs->currency }}</b></p>
                            <p>Single Room Surcharge(SRS): <b>{{ $costs->srsprice }}{{ $costs->currency }}</b></p>
                     @endforeach                                                 <hr>
                     
                     <div class="row">
                            <div class="col-lg-12 text-center">                       
                            
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bookNow">Book Now</button>

                    <a href="/enquiry/{{$id}}" role="button" class="btn btn-primary float-right">Enquiry</a>
                            </div>
                            </div>
                     </hr>
                       

                           </div>  
                        </div>
                    </div>

                </div>
            </div>         
        </div>
    </section>


<script>
function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click(); 


$('#myTab a').on('click', function (event) {
  event.preventDefault()
  $(this).tab('show')
})

</script>
@endsection


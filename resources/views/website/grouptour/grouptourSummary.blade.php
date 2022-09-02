@extends('website.layouts.apps')
@section('content')

  <section class="bg-gray ">
        <div class="container-fluid">
            <div class="package-list-wrap ">
                <img src="{{URL::asset('/storage/uploads/'.$programs->attachment) }}" class="img-fluid" alt="det-img" style="min-height: 20vh !important;max-height: 80vh;background-size: cover;width: 100%;">
                <div class="package-list-content">
                    <p class="package-list-duration">{{$programs->days}} Days, {{$programs->days -1}}  Night(s)<span
                            class="rate">
               <!--             @if($discounts !=[])-->
               <!--             ${{number_format($discounts->new_price),2 }}-->
               <!--    @else-->
               <!--$ {{ number_format($programs->price),2 }}-->
              @endif</span>
                    </p>
                    <h3 class="package-list-title">
                        {{ $programs->tour_name }}
                    </h3>
                    <a href="#" role="button" class="btn btn-success float-left" data-toggle="modal" data-target="#bookNow">Book Now</a>

                </div>
           @if($discounts !=[])
           <span class="off-box">            
                 <div class="col-md-12 col-sm-12 col-xs-12">
                                           <span class="text-danger" style="font-size:18px"><strong>${{number_format($discounts->new_price),2 }} </strong> pp
                                           </span><s style=""><sup>$ {{number_format($programs->price),2 }} </sup></s><br>
                                            <span style="font-size:12px;">Save ${{number_format($discounts->save),2 }}</span>
                </div>
              </span>
              @else
               <span class="off-box">FROM  $ {{number_format($programs->price),2 }}</span>
              @endif
             </div>

            <div class="row ">
                {{-- start of tabs --}}
            <div class="col-lg-12 col-md-12 col-sm-12 masonry ">
                    <div class="package-detail">
                           <!-- Tabs starts here -->
            <div class="row ">
                {{-- start of tabs --}}
            <div class="col-lg-9 col-md-9 col-sm-12 masonry ">
                    <div class="package-detail"> 
                             
            <div class="">
            <ul class="nav nav-tabs">
              <li><a href="#tab-H" data-toggle="tab">Highlight</a></li>
              <li class="active"><a href="#tab-I" data-toggle="tab">Itinerary</a></li>
              <li><a href="#tab-A" data-toggle="tab">Accommodations</a></li>
              <li><a href="#tab-C" data-toggle="tab">Tour Cost</a></li>
              <li><a href="#tab-E" data-toggle="tab">Extra Information</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane row fade" id="tab-H">                
                <div class="col-md-12 col-sm-12">
                <p>
                                {{ $programs->tour_highlight }}</p>
                                    <hr>
                                <p>Maps Come Here</p>
               </div>
              </div>
              <div class="tab-pane row fade  in active" id="tab-I">
                <div class="col-md-12 col-sm-12 booking-tourPadding">
                <p class="card-text booking-tourPadding">
                                            {{ $programs->itinerary_summury }}
                                            </p>
                                            @foreach ($datas as $data)
                                            <div class="card card-primary booking-tourPadding">
                                                <div class="card-header  booking-tourPadding" style="background-color:Gray;">
                                                <span><b>Day {{ $data->day }} - {{ $data->itinerary_title }}</b></span>

                                                </div>
                                                <div class="card-body">
                                                {{-- test --}}

                                                <div class="row masonry-item">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 masonry">
                                       <div class="">

                                <div class="row ">
                                <div class="col-lg-7">
                                <div class="hotel-diss">
                               <p>{{ $data->itinerary_description }}</p>   
                                               
                                                     
                               <div class="row"> 
                                      <div class="col-md-12 col-lg-12 col-sm-12">
                                        <p><b class="text-success">Distance:</b> {{$data->distance}} KM <b class="text-success">Transport:</b> {{$data->transport}}</p>

                                          <p><b class="text-success">Accommodation:</b> {{$data->accommodation_name}} | <b class="text-success">Meal Plan:</b> {{$data->meal}}</p>
                                      </div>           
                                                                                 
                                                  </div>
                                                 </div>
                                               </div>
                                        <div class="col-lg-5">                           
                                            <div class="hotel-pics-one">                                               <img src="{{URL::asset('/storage/destination/'.$data->photo) }}" alt="" style="min-height: 20vh !important;max-height: 80vh;width: 100% !important">                                                                              </div> 

                                                 </div>
                                                 </div>
                                                </div>
                                                </div>
                                                </div>

                                        {{-- test --}}
                                            </div>
                                            </div>
                                            <hr>
                                            @endforeach
                </div>
              </div>
              <div class="tab-pane fade" id="tab-A">
               @foreach ($datas as $data)
     
       <div class="card booking-tourPadding">   
      <div class="card-header  booking-tourPadding" style="background-color:green">
    <span><b>Day {{ $data->day }} - {{ $data->itinerary_title }}<b></span>                                              
                     </div>          

                        <div class="card-body">
                       <div class="row ">
                                <div class="col-lg-7">
                                <div class="hotel-diss">
                
                               <div class="row">                   
                                <div class="col-md-6 col-lg-6 col-sm-12">                                    
                                  <div class="rating">                     
                                    <h4>Location Details</h4>                        
                                  </div>                                                                        

                                  <a class="map-viw" href="#"><i class="fa fa-map-marker"></i> {{ $data->destination_name }}</a> 
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i> {{ $data->location_name }}/{{ $data->region }}/{{ $data->country }}</a>    
                                   </div>                                                                                                                           
                                <div class="col-md-6 col-lg-6 col-sm-12">                              
                                <div class="rating">                                                                         <h4>Accommodation Details</h4>                                                                       </div>  <a class="map-viw" href="#"><i class="fa fa-home"></i><b>{{ $data->accommodation_name }}</b></a>      

                                    <div>                            
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Standard Category: <br>  
                                        @for($i=0;$i<$data->national_standard;$i++)                                 
                                        <span class="fa fa-star text-warning"></span>
                                        @endfor
                                         @for($i=0;$i<5-$data->national_standard;$i++)   
                                        <span class="fa fa-star-o text-warning"></span>
                                           @endfor
                                         </div></b></a>
 
                                       <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Our Category</b>: {{$data->type }}:</a>
                                       <a href="https://{{$data->url}}" class="btn btn-primary" role="button">View More</a>                                          </div>
                                                  </div>
                                                 </div>
                                               </div>
                                        <div class="col-lg-5">                  
                                            <div class="hotel-pics-one">                                    <img src="{{URL::asset('/storage/uploads/'.$data->attachment) }}" alt="" style="min-height: 20vh !important;max-height: 80vh !important;width:100%">        
                                            </div>                    

                                      </div>
                               </div>                           
                                </div>
                                </div> 
                                <hr>
                            @endforeach  
             
              </div>

         
<div id="tab-C" class="tab-pane fade">
        <div class="card">
        <div class="card-body">
            <div class="card-body">
    <table class="table table-bordered data-table"> 
        <colspan>
           <col width="10%">
          <col width="20%">
          <col width="10%">
        </colspan>
        <tr>
          <th class="title" colspan="8" style="background-color:white"><b>Tour Cost Summary Table</b></th>
        </tr>
        
        <tr>
        <th><b>#<b></th>       
          <th><b>Start Date</b></th>
           <th><b>End Date</b></th>
           <th><b>Price</b></th>
          <th><b>SRS</b></th>
           <th><b>Available Seats</b></th> 
                      
                </tr>               
             @foreach ($basicCount as $valueCount) 
                    @php                  
                      $myDateTime = DateTime::createFromFormat('m-Y', $valueCount->datef);
                      $yearM = $myDateTime->format('M-Y'); 
                    @endphp 

   <th class="title" colspan="8" style="background-color:beige;"><b class ="text-success">{{$yearM}}</b></th>
                 @foreach ($basic as $value) 
                    @php
                    $i=1;
                    $myDateTime = DateTime::createFromFormat('Y-m-d', $value->start_date);
                    $month = $myDateTime->format('M');  
                    $year = $myDateTime->format('Y');
                    $yearM = $myDateTime->format('m-Y');  
                    @endphp 
                   
                    @if($valueCount->datef==$yearM)                 
                     <tr>
                    <td>{{$i}}</td>
                    <td> {{ $value->start_date}}</td>
                     <td>{{$value->end_date}}</td>
                     <td>{{number_format( $value->price),2}} {{ $value->currency }}</td>
                     <td>{{ $value->srs }}</td>
                    <td>{{ $value->seats }}</td>  
                    </tr>
                    @php  
                    $i =1 +$i;
                     @endphp                      
                   
                    
                    @endif
                 @endforeach
                 @endforeach                   
                 
          </table>

      
                            </div>
                        </div>
                     </div>
                    </div>
                     

              <div class="tab-pane fade" id="tab-E">                
       <div class="card">   
      <div class="card-header">
                                            <h5 class="m-0">Accommodation List : Inclusive and Not Inclusive</h5>           
                                              </div>                                 
                                                
           

                       <div class="card-body">
                       <div class="row ">
                                <div class="col-lg-7">
                                <div class="hotel-diss">
                
                               <div class="row">                   
                                <div class="col-md-6 col-lg-6 col-sm-12">                                   
                                  <div class="rating">                                                                     <h4>Not Inclusive</h4>                   </div>                                
   @foreach($inclusives as $inclusive)    
                                  <div class="form-check">
   <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled>
  <label class="form-check-label" for="flexCheckDisabled">
   {{ $inclusive->inclusive}}
  </label>
</div>
     @endforeach                              
    </div>                                                                                 
                                                  </div>
                                                 </div>
                                               </div>
                                        <div class="col-lg-5">  
                                            <div class="rating">                                                                   <h4>Inclusive</h4>                                                                       </div>                                        @foreach($assignLists as $assignList)
                                    <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
  <label class="form-check-label" for="flexCheckChecked">
   {{ $assignList->inclusive}}
  </label>
</div>  
@endforeach                  
                                                    
                                </div>
                               </div>                           
                                </div>
                                </div> 
             </div> 
         
    

                    </div>
                    </div>  


                    </div>
                    </div>

                    {{-- End of tabs --}}
                    {{-- Tour Summury sidebar --}}
                    <div class="col-md-3 col-lg-3 masonry">
                        <div class="card">
                        <div class="card-body">
                            <div >

                                <h4>TOUR SUMMARY</h4>
                                 <hr>                                  
                                     <div>Tour Type: <b>{{ $programs->type }}</b></div>
                            <div>Tour Style: <b>{{ $programs->category }}</b></div>
                            <div>Tour Duration: <b>{{ $programs->days }} Days</b></div>
                            <div>Group Size: <b>{{ $value->seats??'' }}</b></div>
                            <div>Starts: <b>{{$value->start_date??'' }}</b></div>
                            <div>Ends: <b>{{ $value->end_date??'' }}</b></div>
                             <div>Countries: <b>Tanzania</b> </div>
                            <hr>
                            <div>Destinations:
                                @foreach($datas as $destnation)
                               <span class="text-primary " style="font-size: 12px; border-right:solid 1px #ddd; padding-right:2px"> {{ $destnation->destination_name }}</span>
                                @endforeach
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                            <a href="#" role="button" class="btn btn-success float-left" data-toggle="modal" data-target="#bookNow">Book Now</a>
                              <a href="/enquiry/{{$id}}" role="button" class="btn btn-primary float-right">Enquiry</a>
                            </div>
                            </div>
                         <hr>
                           
                                <p class="text-center">
                               <h5 > List of Add-ons</h5>
                                </p>
                       <!-- Button trigger modal -->
 @foreach ($addons as $addon)
  <!-- Modal -->
        <div class="package-list-wrap "><img src="{{URL::asset('/storage/uploads/'.$addon->attachment) }}" class="img-fluid" alt="No Image" style="min-height: 20vh !important;max-height: 80vh !important;width:100%">
        <div class="package-list-content">
       <p class="package-list-duration">{{ $addon->days  }} Days From ${{$addon->price}}</p>
      <h3 class="package-list-title">
      <a href="#">{{ $addon->addon_name }}</a>
                          </h3>
   <a class="package-list-button" href="{{ route('addons.show',$addon->id) }}">Explore More</a>
                                          </div>
                                        </div>
                                    @endforeach


                       
                    </div>
                   
{{-- End of tour summary sidebar --}}

                </div>
                  <hr>
                <p class="text-center">
                <a class="btn btn-primary" href="{{ route('addons.index') }}" >View More Addons</a></p>
                </div>

                </div>
            </div>

        </div>
    </div>
    </section>




{{-- Modal for booking form --}}
<!-- Modal -->
<div class="modal fade" id="bookNow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $programs->tour_name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

<form  method="post" id="post_form" action="{{ route('tourForm.store') }}">

    @csrf
    <div class="row">
       <div class="col-md-6">
        <div class="form-group">

            
              @if($discounts !=null)
           <input type="hidden" class="form-control" name="unit_price" value="{{$discounts->new_price}}">
             @else
              <input type="hidden" class="form-control" name="unit_price" value="{{$programs->price}}">
             @endif

            <input type="hidden" class="form-control" name="currency" value="{{ $programs->currency }}">

            <label for="">First Name:</label>
          <input type="text" class="form-control" placeholder="First Name" min="1" max="22" name="first_name">
        </div>
     </div>
     <div class="col-md-6">
        <div class="form-group">
            <label for="">Last Name:</label>
          <input type="text" class="form-control" placeholder="Last Name" min="1" max="22" name="last_name">
        </div>
     </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="">Email:</label>
          <input type="email" class="form-control" placeholder="Email" min="1" max="62" name="email">
        </div>
     </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="">Country:</label>
          <input type="text" class="form-control" placeholder="Country" name="country">
        </div>
     </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="">Phone:</label>
          <input type="number" class="form-control" placeholder="Phone number" min="0"  name="phone">
        </div>
     </div>

      <div class="col-md-6">
        <div class="form-group">           
            <label for="">Tour Date:</label>
             <input type="hidden" class="form-control" placeholder=""  name="tour_id" value="{{$programs->program_id}}" readonly="true">
          <input type="hidden" class="form-control" placeholder=""  name="tour_type" value="{{$programs->category}}" readonly="true">
             <select class="selectpicker search-fields form-control" name="tour_date">
              <option value="0">--Select Tour Date--</option>
        @foreach($departureDate as $departure)
          @php
                    $i=1;
                    $myDateTime = DateTime::createFromFormat('Y-m-d', $departure->start_date);                 
                    $yearM = $myDateTime->format('d-M-Y');  
                    @endphp 

        <option><b class="text-success">{{$yearM}}</b></option>
        @endforeach
          </select>

        </div>
     </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="">Accommodations:</label>
          <select class="selectpicker search-fields form-control" name="accomodation">
              <option value="0">--Select Accomodation--</option>
              <option value="Basic">Basic</option>
              <option value="Comfort">Comfort</option>
                <option value="Deluxe">Deluxe</option>
              <option value="Mix">Mix</option>
              <option value="Not sure">Not sure</option>
          </select>

     </div>
     </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="">Tour Addon:</label>
         <select class="selectpicker search-fields form-control" name="addon">
              <option value="0" selected>None</option>
              @foreach ($addons as $addon)
            <option value="{{ $addon->price }}">{{ $addon->addon_name }} - {{ $addon->days }} days / ${{ $addon->price }}</option>
              @endforeach
          </select>

     </div>
     </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="">Travel Date:</label>
           <div class="form-group date input-datepicker">
          <input type="date" class="form-control" name="travel_date"
              data-date-format="yyyy-mm-dd" placeholder="travel date">
          <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
      </div>

     </div>
     </div>

      <div class="col-md-6">
        <div class="form-group">
            <label for=""> No of Adults(>16yrs):</label>
          <input type="number" class="form-control" placeholder=""  min="0" name="adults">
        </div>
        </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for=""> No of Teens(13-14yrs):</label>
          <input type="number" class="form-control" placeholder="" min="0" name="teens">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for=""> Number of Children (5-12 yrs):</label>
          <input type="number" class="form-control" placeholder="" min="0" name="children">
        </div>
        </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="">  Additional Information we should know?</label>
         <textarea class="form-control" id="" cols="2" rows="2" name="additional_information" placeholder="Type your additional information here..."></textarea>
        </div>
     </div>


     <div class="col-md-12">
        <div class="form-group">
            <label for=""> How did you hear about us?:</label>

       <div class="form-group">
           <label for="facebook">Facebook
          <input id="facebook" type="checkbox" class="zt-control"  name="hear[]" value="Facebook">
        </label>
        <label for="instagram">Instagram
          <input id="instagram" type="checkbox" class="zt-control"  name="hear[]" value="Instagram">
        </label>
          <label for="google">Google
          <input id="google" type="checkbox" class="zt-control"  name="hear[]" value="Google">
        </label>
          <label for="mouth">Word of Mouth
          <input  id="mouth" type="checkbox" class="zt-control"  name="hear[]" value="Word of Mouth">
        </label>
        </div>
        </div>


  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <label for=""> Other Media:</label>
           <input type="text" class="form-control" name="hear_about_us">
        </div>
        </div>
        </div>
        </div>


<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>
{{-- end of booking form madal --}}

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


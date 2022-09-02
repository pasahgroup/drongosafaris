
@extends('website.layouts.apps')
@section('content')

  <section class="bg-gray ">
        <div class="container-fluid">
            <div class="package-list-wrap ">
                <img src="{{URL::asset('/storage/uploads/'.$programs->attachment) }}" class="img-fluid" alt="det-img" style="min-height: 20vh !important;max-height: 75vh;background-size: cover;width: 100%;">
                <div class="package-list-content">
                    <p class="package-list-duration">{{$programs->days}} Days, {{$programs->days -1}}  Night(s)<span
                            class="rate">

              <!--              @if($discounts !=[])-->
              <!--              ${{number_format($discounts->new_price),2 }}-->
              <!--     @else-->
              <!-- $ {{number_format($programs->price),2 }}-->
              <!--@endif-->

                    </span>
                    </p>
                     
                     <h3 class="package-list-title">
                        {{ $programs->tour_name }}
                    </h3>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bookNow">Book Now</button>

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
            <div class="tab-content booking-btn">
              <div class="tab-pane row fade" id="tab-H">                
                <div class="col-md-12 col-sm-12">
                <p>
                                {{ $programs->tour_highlight }}</p>
                                    <hr>
                                <p>Maps Come Here</p>
               </div>
              </div>
              <div class="tab-pane row fade in active" id="tab-I">
                <div class="col-md-12 col-sm-12">
                <p class="card-text">
                                            {{ $programs->itinerary_summury }}
                                            </p>
                                            @foreach ($datas as $data)
                                            <div class="card card-primary booking-tourPadding">
                                                <div class="card-header  booking-tourPadding"  style="background-color:Gray;">
                                                <span><b> Day {{ $data->day }} - {{ $data->itinerary_title }}</b></span>

                                                </div>
                                                <div class="card-body">
                                                {{-- test --}}

                                                <div class="row masonry-item">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 masonry">
                                       <div class="">

                                <div class="row">
                                <div class="col-lg-7">
                                <div class="hotel-diss">
                               <p class="booking-btn-gray">{{ $data->itinerary_description }}</p>   
                                               
                                                     
                               <div class="row"> 
                                      <div class="col-md-12 col-lg-12 col-sm-12">
                                        <p><b class="text-success">Distance:</b> {{$data->distance}} KM <b class="text-success">Transport:</b> {{$data->transport}}</p>

                                          <p><b class="text-success">Accommodation:</b> {{$data->accommodation_name}} | <b class="text-success">Meal Plan:</b> {{$data->meal}}</p>
                                      </div>           
                                                                                 
                                                  </div>
                                                 </div>
                                               </div>
                                        <div class="col-lg-5">                           
                                            <div class="hotel-pics-one">                                               <img src="{{URL::asset('/storage/destination/'.$data->photo) }}" alt="" style="height: 32vh !important;width:100%">                                                                              </div> 

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
      <div class="card-header booking-tourPadding" style="background-color:green">
    <span><b>Day {{ $data->day }} - {{ $data->itinerary_title }}</b></span>
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
                                <div class="col-md-6 col-lg-6 col-sm-12 booking-tour">                             
                                <div class="rating">                                                                       <h4>Accommodation Details</h4>                                                                       </div>  <a class="map-viw" href="#"><i class="fa fa-home"></i><b>{{ $data->accommodation_name }}</b></a>      

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
                                            <div class="hotel-pics-one">                                    
                                            <img src="{{URL::asset('/storage/uploads/'.$data->attachment) }}" alt="" style="height: 32vh !important;width:100%">        
                                            </div>                   

                                      </div>
                               </div>                           
                                </div>
                                </div>  
                                <hr>
                            @endforeach  
             
              </div>
              <div class="tab-pane fade" id="tab-C">               
                 <div class="card booking-btn">                    
        <div class="card-body">
            <div class="card-body">               
        <table class="table table-bordered data-table">
        <colspan>
           <col width="10%">
          <col width="20%">
          <col width="10%">
        </colspan>
        <tr>
          <th class="title" colspan="8" style="background-color:gray;"><b>BASIC LEVEL ACCOMODATIONS</b></th>
        </tr>
        <tr>
           <th class="title" colspan="2"></th>
          <th class="title" colspan="6"><b>PRICE PER PERSON IN USD<b></th>
        </tr>
        <tr>
        <th>#</th>
          <th>Season</th>          
          <th>2PAX</th>
           <th>3PAX</th>
            <th>4PAX</th>
             <th>5PAX</th>
              <th>6PAX</th>
              <th>SRS</th>
        </tr>

          @foreach ($basic as $datab)
          <tr>
                    <td>{{ $datab->id }}</td>
                  <td>{{ $datab->season}}</td> 
                   
                    <td>{{ $datab->twopax }}</td>
                    <td>{{ $datab->threepax }}</td>
                    <td>{{ $datab->fourpax }}</td>
                    <td>{{ $datab->fivepax }}</td>
                    <td>{{ $datab->sixpax }}</td>
                    <td>{{ $datab->srs }}</td>
                  </tr>
                   @endforeach
         </table>

<hr>
<table class="table table-bordered data-table">
        <colspan>
           <col width="10%">
          <col width="20%">
          <col width="10%">
        </colspan>
        <tr>
          <th class="title" colspan="8" style="background-color:gray"><b>COMFORT LEVEL ACCOMODATIONS</b></th>
        </tr>
        <tr>
           <th class="title" colspan="2"></th>
          <th class="title" colspan="6"><b>PRICE PER PERSON IN USD</b></th>
        </tr>
        <tr>
         <th>#</th>
          <th>Season</th>           
          <th>2PAX</th>
           <th>3PAX</th>
            <th>4PAX</th>
             <th>5PAX</th>
              <th>6PAX</th>
              <th>SRS</th>
        </tr>

 @foreach ($comfort as $datac)
          <tr>
                  <td>{{ $datac->id }}</td>
                     <td>{{ $datac->season}}</td>                   
                    <td>{{ $datac->twopax }}</td>
                    <td>{{ $datac->threepax }}</td>
                    <td>{{ $datac->fourpax }}</td>
                    <td>{{ $datac->fivepax }}</td>
                    <td>{{ $datac->sixpax }}</td>
                    <td>{{ $datac->srs }}</td>
                  </tr>
                   @endforeach
         </table>
         <hr>
         <table class="table table-bordered data-table">
        <colspan>
           <col width="10%">
          <col width="20%">
          <col width="10%">
        </colspan>
        <tr>
          <th class="title" colspan="8" style="background-color:gray"><b>DELUXE LEVEL ACCOMODATIONS</b></th>
        </tr>
        <tr>
           <th class="title" colspan="2"></th>
          <th class="title" colspan="6"><b>PRICE PER PERSON IN USD</b></th>
        </tr>
        <tr>
             <th>#</th>
          <th>Season</th>           
          <th>2PAX</th>
           <th>3PAX</th>
            <th>4PAX</th>
             <th>5PAX</th>
              <th>6PAX</th>
              <th>SRS</th>
        </tr>

          @foreach ($luxury as $datal)
          <tr>
                       <td>{{ $datal->id }}</td>
                    <td>{{ $datal->season}}</td>                   
                    <td>{{ $datal->twopax }}</td>
                    <td>{{ $datal->threepax }}</td>
                    <td>{{ $datal->fourpax }}</td>
                    <td>{{ $datal->fivepax }}</td>
                    <td>{{ $datal->sixpax }}</td>
                    <td>{{ $datal->srs }}</td>
                    <tr>
                   @endforeach
                   </table>
                        </div>
                        </div>
                     </div>

              </div>

            <div class="tab-pane fade" id="tab-E">                
       <div class="card booking-btn-gray">   
      <div class="card-header">
                                            <h5 class="m-0">Accommodation List : Inclusive and Not Inclusive</h5>           
                                              </div>                                 
                                                
           

                        <div class="card-body">
                       <div class="row ">
                                <div class="col-lg-7">
                                <div class="hotel-diss">
                
                               <div class="row">                   
                                <div class="col-md-6 col-lg-6 col-sm-12">                                   
                                  <div class="rating">                                                                      <h4>Not Inclusive</h4>                        
                                  </div>                                
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
                                            <div class="rating">    
                                                <h4>Inclusive</h4>                                                           

                                            </div>                                        @foreach($assignLists as $assignList)
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
                            <div class"card booking-btn">
                            <div >
                                <h4 class="text-secondary booking-tourPadding"><b>Tour Summary</b></h4>
                            </div>                           
                            <div>Type: <b>{{ $programs->type }}</b></div>
                            <div>Style: <b>{{ $programs->style }}</b></div>
                            <div>Duration: <b>{{ $programs->days }} Days</b></div>
                            <div>Countries: <b>Tanzania</b> </div>
                            <div>Destinations:
                                @foreach($datas as $destnation)
                               <span class="text-primary " style="font-size: 12px; border-right:solid 1px #ddd; padding-right:2px"> {{ $destnation->destination_name }}</span>
                                @endforeach
                        </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-lg-12 text-center">                         
                            
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bookNow">Book Now</button>

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
   <a class="package-list-button" href="{{ route('addons.show',$addon->id) }}">View More</a>
                                          </div>
                                        </div>
                                    @endforeach
                    </div>
{{-- End of tour summary sidebar --}}

                </div>
                <hr>
                <p class="text-center">
                <a class="btn btn-primary" href="{{ route('addons.index') }}">View More Addons</a></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    </section>




{{-- Modal for Enquiry form1 --}}
<!-- Modal -->
<div class="modal fade" id="enquiry" tabindex="-1" role="dialog" aria-labelledby="enquiryLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="enquiryLabel">{{ $programs->tour_name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


<form  method="post" id="post_form" action="{{ route('tourForm.store') }}">

    @csrf  

        <div class="search_area search_area_two booking-tour"> 
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h4 id="heading">Enquiry Form</h4>
                <p>Fill all form field to go to next step</p>
                <form id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar">
                      <li class="active" id="account"><strong>Personal Details</strong></li>
                        <li id="personal"><strong>Extra Details</strong></li>
                        <li id="payment"><strong>Enquiry</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Personal Details:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                </div>
                            </div> 
                            <label class="fieldlabels">First Name: *</label> <input type="text" name="first_name" placeholder="first name" /> 
                             <label class="fieldlabels">Last Name: *</label> <input type="text" name="last_name" placeholder="last name" /> 
                              <label class="fieldlabels">Phone: *</label> <input type="number" name="phone" placeholder="phone" /> 
                              <label class="fieldlabels">Email: *</label> <input type="number" name="email" placeholder="email" /> 

                            <label class="fieldlabels">Nationality: *
                            </label>
                             <input type="text" name="uname" placeholder="nationality" /> 
                         </div> 
                        
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                            <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Extra Details:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 4</h2>
                                </div>
                             </div>

                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <label for="">Children (5-12 yrs):</label>
                                    <div class="form-group">
                                        <input type="number" class="zt-control" placeholder="0" name="children" min="0">
                                    </div>
                                </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                 
                                  <label for="">Tour of Interest:</label>
                                    <div class="form-group icon_down">
                                        <select class="selectpicker search-fields form-control" name="tour_type">
                                              <option value="0">--Select tour type--</option>
                                            <option value="Safaris">Safaris</option>
                                            <option value="Trekking">Mt.Trekking</option>
                                              <option value="Holidays">Beach Holidays</option>
                                            <option value="Historical_sites">Historical Sites</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                            <label class="fieldlabels">First Name: *</label> <input type="text" name="fname" placeholder="First Name" /> <label class="fieldlabels">Last Name: *</label> <input type="text" name="lname" placeholder="Last Name" /> <label class="fieldlabels">Contact No.: *</label> <input type="text" name="phno" placeholder="Contact No." /> <label class="fieldlabels">Alternate Contact No.: *</label> <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                        </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Enquiry:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 4</h2>
                                </div>
                            </div> <label class="fieldlabels">Upload Your Photo:</label> <input type="file" name="pic" accept="image/*"> <label class="fieldlabels">Upload Signature Photo:</label> <input type="file" name="pic" accept="image/*">
                        </div> <input type="button" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
   
</form>
  </div>
</div>
</div>
</div>
{{-- end of Enquiry form madal --}}


{{-- Modal for booking form --}}

<div class="modal fade" id="bookNow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>{{$programs->tour_name}}</b></h5>
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
                            
             <input type="hidden" class="form-control" name="tour_name" value="{{ $programs->tour_name }}">
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
            <label for="">Tour type:</label>
                   <input type="hidden" class="form-control" placeholder=""  name="tour_id" value="{{$programs->program_id}}" readonly="true">
          <input type="text" class="form-control" placeholder=""  name="tour_type" value="{{$programs->category}}" readonly="true">
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

     <div class="col-md-12">
        <div class="form-group">
            <label for=""> No of Teens(13-14yrs):</label>
          <input type="number" class="form-control" placeholder="" min="0" name="teens">
        </div>
    </div>

    <div class="col-md-12">
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


<div class="modal-footer">
  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-success">Save changes</button>
</div>
</form>     
      </div>
    </div>
  </div>
</div>

{{-- end of booking form madal --}}

<script type="text/javascript" src="../../../js/jquery321.min.js"></script>
<!--<script type="text/javascript" src="../../../js/bootstrap431.bundle.min.js"></script>-->

<script type="text/javascript">
    
$(document).ready(function(){
var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);
$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});
</script>

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


@extends('website.layouts.apps')
@section('content')

<style>
.vl {
  border-left: 1px solid green;
  height: 20px;
   width: 100%;
}
</style>

  <section class="bg-gray ">
        <div class="container-fluid">
         
            <div class="row ">
                {{-- start of tabs --}}
                <div class="col-lg-12 col-md-12 col-sm-12 masonry ">
                    <div class="package-detail">
                              <div class="tab" id="myTabContent">
                                    <button class="tablink" onclick="openPage('tabB', this, 'orange')" id="defaultOpen" >Basic</button>
                                    <button class="tablink" onclick="openPage('tabC', this, 'orange')" id="Open" >Comfort</button>
                                    <button class="tablink" onclick="openPage('tabD', this, 'orange')">Deluxe</button>
                                    <button class="tablink" onclick="openPage('tabP', this, 'orange')" >Premium</button>
                                    <button class="tablink" onclick="openPage('tabO', this, 'orange')"> Other</button>
                            </div>
                            

        <div id="tabB" class="tabcontent">
       <p class="card-text text-center"><b class="">Basic Level</b></p>
       
    @foreach ($datas as $data)
     @if($data->type=='Basic')
       <div class="card">   
      <div class="card-header booking-tourPadding">
                                                <h5 class="m-0"><b>{{ $data->category }}: {{ $data->accommodation_name }} </b></h5>                                              
                                                </div>
           

                        <div class="card-body booking-tourPadding">
                       <div class="row">
                                <div class="col-lg-9">
                                <div class="hotel-diss">

                               <p>{{ $data->itinerary_description }}</p>                 
                                                     
                               <div class="row">                   
                                <div class="col-md-6 col-lg-6 col-sm-12">                                   
                                  <div class="rating">                
                                    <h4>Location Details</h4>                        
                                  </div>                                

                                  <a class="map-viw" href="#"><i class="fa fa-map-marker"></i> {{ $data->location_name }}</a> 
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i> {{ $data->location_name }}/{{ $data->region }}/{{ $data->country }}</a>    
                                   </div>                                                                                                                           
                                <div class="col-md-6 col-lg-6 col-sm-12">                              
                                <div class="rating">                                                                         <h4>Accommodation Details</h4>                                                                       
                                </div>  
                                <a class="map-viw" href="#"><i class="fa fa-home"></i><b>{{ $data->accommodation_name }}</b> | From <b style="color:blue">$ {{number_format($data->price,2) }}</b></a>      

                                    <div>                            
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Standard Category:   
                                        @for($i=0;$i<$data->national_standard;$i++)                                 
                                        <span class="fa fa-star text-warning"></span>
                                        @endfor
                                         @for($i=0;$i<5-$data->national_standard;$i++)   
                                        <span class="fa fa-star-o text-warning"></span>
                                           @endfor
                                         </div></b></a>                                      

                                       <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Our Category</b>: {{$data->type }}:</a>
                                                                                
                                     </div>
                                                  </div>
                                                 </div>
                                               </div>
                                    <div class="col-lg-3">                           
                                            <div class="hotel-pics-one">                                                
                                                  <img src="{{URL::asset('/storage/uploads/'.$data->attachment) }}" alt="" style="height: 32vh !important;width:100%">                                                   
                                                
                                                 </div>  
                                                  <a href="https://{{$data->url}}" class="btn btn-primary float-right" role="button">View More</a>                                                 
                                    </div>
                       

                               </div>                           
                                </div>
                                </div>
                                <hr>
                                @endif
                            @endforeach                
                     
                      </div>

                                           
        <div id="tabC" class="tabcontent">
       <p class="card-text text-center"><b class="">Comfort Level</b></p>
       
      @foreach ($datas as $data)
     @if($data->type=='Comfort')
       <div class="card">   
      <div class="card-header booking-tourPadding">
                                                <h5 class="m-0"><b>{{ $data->accommodation_name }}: {{ $data->accommodation_name }}</b></h5>                                              
                                                </div>
           

                        <div class="card-body  booking-tourPadding">
                       <div class="row ">
                                <div class="col-lg-9">
                                <div class="hotel-diss">

                               <p>{{ $data->itinerary_description }}</p>                 
                                                     
                               <div class="row">                   
                                <div class="col-md-6 col-lg-6 col-sm-12">                                    
                                  <div class="rating">                                                                            <h4>Location Details</h4>                        </div>                                

                                  <a class="map-viw" href="#"><i class="fa fa-map-marker"></i> {{ $data->location_name }}</a> 
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i> {{ $data->location_name }}/{{ $data->region }}/{{ $data->country }}</a>    
                                   </div>                                                                                                                           
                                <div class="col-md-6 col-lg-6 col-sm-12">                              
                                <div class="rating">                                                            
                                    <h4>Accommodation Details</h4>                                                               </div>  
                                <a class="map-viw" href="#"><i class="fa fa-home"></i><b>{{ $data->accommodation_name }}</b> | From <b style="color:blue">$ {{number_format($data->price,2) }}</b></a>      

                                    <div>                            
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Standard Category:   
                                        @for($i=0;$i<$data->national_standard;$i++)                                 
                                        <span class="fa fa-star text-warning"></span>
                                        @endfor
                                         @for($i=0;$i<5-$data->national_standard;$i++)   
                                        <span class="fa fa-star-o text-warning"></span>
                                           @endfor
                                        </b></a> </div>
                                       

                                       <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Our Category</b>: {{$data->type }}:</a>
                                                                        
                                   </div>
                                                  </div>
                                                 </div>
                                               </div>
                                        <div class="col-lg-3">                          
                                         <div class="hotel-pics-one">                                               
                                            <img src="{{URL::asset('/storage/uploads/'.$data->attachment) }}" alt="" style="height: 32vh !important;width:100%">                                                                      </div>
                                                <a href="https://{{$data->url}}" class="btn btn-primary" role="button">View More</a>
                                                                                                
                                      </div>
                                                     
                               </div>                           
                                </div>
                                </div>
                                <hr>
                                @endif
                            @endforeach  
                     </div>
                      

   <div id="tabD" class="tabcontent">
       <p class="card-text text-center"><b class="">Deluxe Level</b></p>
       
      @foreach ($datas as $data)
     @if($data->type=='Deluxe')
       <div class="card">   
      <div class="card-header booking-tourPadding">
                                                <h5 class="m-0"><b>{{ $data->accommodation_name }}: {{ $data->accommodation_name }}</b></h5>                                              
                                                </div>
           

                        <div class="card-body booking-tourPadding">
                       <div class="row ">
                                <div class="col-lg-9">
                                <div class="hotel-diss">

                               <p>{{ $data->itinerary_description }}</p>                 
                                                     
                               <div class="row">                   
                                <div class="col-md-6 col-lg-6 col-sm-12">                                    
                                  <div class="rating">                                                                            <h4>Location Details</h4>                        </div>                                

                                  <a class="map-viw" href="#"><i class="fa fa-map-marker"></i> {{ $data->location_name }}</a> 
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i> {{ $data->location_name }}/{{ $data->region }}/{{ $data->country }}</a>    
                                   </div>                                                                                                                           
                                <div class="col-md-6 col-lg-6 col-sm-12">                              
                                <div class="rating">                                                                         <h4>Accommodation Details</h4>                                                                       </div>  <a class="map-viw" href="#"><i class="fa fa-home"></i><b>{{ $data->accommodation_name }}</b> | From <b style="color:blue">$ {{number_format($data->price,2) }}</b></a>      

                                    <div>                            
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Standard Category:   
                                        @for($i=0;$i<$data->national_standard;$i++)                                 
                                        <span class="fa fa-star text-warning"></span>
                                        @endfor
                                         @for($i=0;$i<5-$data->national_standard;$i++)   
                                        <span class="fa fa-star-o text-warning"></span>
                                           @endfor
                                         </div></b></a>
                                       

                                       <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Our Category</b>: {{$data->type }}:</a>
                                                                               </div>
                                                  </div>
                                                 </div>
                                               </div>
                                        <div class="col-lg-3">                           <div class="hotel-pics-one">                                               
                                         <img src="{{URL::asset('/storage/uploads/'.$data->attachment) }}" alt="" style="height: 32vh !important;width:100%">                                                                      </div>
                                             <a href="https://{{$data->url}}" class="btn btn-primary" role="button">View More</a>
                                                                                             
                                      </div>
                                                 
                               </div>                           
                                </div>
                                </div>
                                <hr>
                                @endif
                            @endforeach  
                      </div>

  <div id="tabP" class="tabcontent">
       <p class="card-text text-center"><b class="">Premium Level</b></p>
       
      @foreach ($datas as $data)
     @if($data->type=='Premium')
       <div class="card">   
      <div class="card-header booking-tourPadding">
                                                <h5 class="m-0"><b>{{ $data->accommodation_name }}: {{ $data->accommodation_name }}</b></h5>                                              
                                                </div>
           

                        <div class="card-body booking-tourPadding">
                       <div class="row ">
                                <div class="col-lg-9">
                                <div class="hotel-diss">

                               <p>{{ $data->itinerary_description }}</p>                 
                                                     
                               <div class="row">                   
                                <div class="col-md-6 col-lg-6 col-sm-12">                                    
                                  <div class="rating">                                                                            <h4>Location Details</h4>                        </div>                                

                                  <a class="map-viw" href="#"><i class="fa fa-map-marker"></i> {{ $data->location_name }}</a> 
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i> {{ $data->location_name }}/{{ $data->region }}/{{ $data->country }}</a>    
                                   </div>                                                                                                                           
                                <div class="col-md-6 col-lg-6 col-sm-12">                              
                                <div class="rating">                                                                         <h4>Accommodation Details</h4>                                                                       </div>  <a class="map-viw" href="#"><i class="fa fa-home"></i><b>{{ $data->accommodation_name }}</b> | From <b style="color:blue">$ {{number_format($data->price,2) }}</b></a>      

                                    <div>                            
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Standard Category:   
                                        @for($i=0;$i<$data->national_standard;$i++)                                 
                                        <span class="fa fa-star text-warning"></span>
                                        @endfor
                                         @for($i=0;$i<5-$data->national_standard;$i++)   
                                        <span class="fa fa-star-o text-warning"></span>
                                           @endfor
                                         </div></b></a>
                                       

                                       <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Our Category</b>: {{$data->type }}:</a>
                                                                                </div>
                                                  </div>
                                                 </div>
                                               </div>
                                        <div class="col-lg-3">                          
                                         <div class="hotel-pics-one">                                               
                                           <img src="{{URL::asset('/storage/uploads/'.$data->attachment) }}" alt="" style="height: 32vh !important;width:100%">                                                                      
                                       </div>
                                           <a href="https://{{$data->url}}" class="btn btn-primary" role="button">View More</a>                                                  
                                      </div>
                                               
                               </div>                           
                                </div>
                                </div>
                                <hr>
                                @endif
                            @endforeach  
                     </div>
                      

        <div id="tabO" class="tabcontent">
       <p class="card-text text-center"><b class="">Other Level</b>: </p>
       
       @foreach ($datas as $data)
     @if($data->type=='Other')
       <div class="card">   
      <div class="card-header booking-tourPadding">
                                                <h5 class="m-0"><b>{{ $data->accommodation_name }}: {{ $data->accommodation_name }}</b></h5>                                              
                                                </div>
           

                        <div class="card-body booking-tourPadding">
                       <div class="row ">
                                <div class="col-lg-9">
                                <div class="hotel-diss">

                               <p>{{ $data->itinerary_description }}</p>                 
                                                     
                               <div class="row">                   
                                <div class="col-md-6 col-lg-6 col-sm-12">                                    
                                  <div class="rating">                                                                            <h4>Location Details</h4>                        </div>                                

                                  <a class="map-viw" href="#"><i class="fa fa-map-marker"></i> {{ $data->location_name }}</a> 
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i> {{ $data->location_name }}/{{ $data->region }}/{{ $data->country }}</a>    
                                   </div>                                                                                                                           
                                <div class="col-md-6 col-lg-6 col-sm-12">                              
                                <div class="rating">                                                                         <h4>Accommodation Details</h4>                                                                       </div>  <a class="map-viw" href="#"><i class="fa fa-home"></i><b>{{ $data->accommodation_name }}</b> | From <b style="color:blue">$ {{number_format($data->price,2) }}</b></a>      

                                    <div>                            
                                     <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Standard Category:   
                                        @for($i=0;$i<$data->national_standard;$i++)                                 
                                        <span class="fa fa-star text-warning"></span>
                                        @endfor
                                         @for($i=0;$i<5-$data->national_standard;$i++)   
                                        <span class="fa fa-star-o text-warning"></span>
                                           @endfor
                                         </div></b></a>
                                       

                                       <a class="map-viw" href="#"><i class="fa fa-home"></i><b>Our Category</b>: {{$data->type }}:</a>
                                                                              </div>
                                                  </div>
                                                 </div>
                                               </div>
                                        <div class="col-lg-3">                           <div class="hotel-pics-one">                                                
                                          <img src="{{URL::asset('/storage/uploads/'.$data->attachment) }}" alt="" style="height: 32vh !important;width:100%">                                                                    </div>
                                              <a href="https://{{$data->url}}" class="btn btn-primary" role="button">View More</a>                                                  
                                      </div>
                                                   
                               </div>                           
                                </div>
                                </div>
                                <hr>
                                @endif
                            @endforeach  
                      </div>

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


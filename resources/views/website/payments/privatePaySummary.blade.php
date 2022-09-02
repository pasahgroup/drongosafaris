@extends('website.layouts.apps')
@section('content')

  <section class="bg-gray ">
        <div class="container">
            <div class="package-list-wrap ">
                <img src="{{URL::asset('/storage/uploads/'.$programs->attachment) }}" class="img-fluid" alt="det-img" style="height:400px !important">
                <div class="package-list-content">

                    <p class="package-list-duration">{{$programs->days}} Days, {{$programs->days -1}}  Night(s) Total Costs
                    </p>
                    <h3 class="package-list-title">
                        <a href="#">{{ $programs->tour_name }}</a>
                    </h3>
                </div>
             @if($discounts !=[])
           <span class="off-box">
            
                 <div class="col-md-12 col-sm-12 col-xs-12">
                                          <span class="text-danger" style="font-size:18px"><strong>${{ $discounts->new_price }} </strong> pp
                                           </span><s style=""><sup>$ {{ $programs->price }} </sup></s><br>
                                            <span style="font-size:12px;">Save ${{ $discounts->save }}</span>
                </div>
              </span>
              @else
               <span class="off-box">Total Costs: ${{ number_format($programs->total_cost) }}</span>
              @endif
            </div>


            <div class="row ">
                {{-- start of tabs --}}
                <div class="col-lg-9 col-md-9 col-sm-12 masonry ">
                    <div class="package-detail">
                              <div class="tab" id="myTabContent">
                                    <button class="tablink" onclick="openPage('tabH', this, 'orange')">Highlight</button>
                                    <button class="tablink" onclick="openPage('tabI', this, 'orange')" id="defaultOpen" >Itinerary</button>
                                    <button class="tablink" onclick="openPage('tabA', this, 'orange')">Accommodations</button>
                                    <button class="tablink" onclick="openPage('tabC', this, 'orange')" >Tour Cost</button>
                                    <button class="tablink" onclick="openPage('tabE', this, 'orange')">Extra Information</button>
                            </div>
                        <div id="tabH" class="tabcontent">
                            <p>
                                <b>Tour Short Desc:</b> {{ $programs->tour_highlight }}</p>
                                    <hr>
                                <p>Maps Come Here</p>
                            </div>
                            
                            <div id="tabI" class="tabcontent">

                                            <p class="card-text">Summary:
                                                {{ $programs->itinerary_summury }}
                                            </p>
                                            @foreach ($datas as $data)
                                            <div class="card card-primary card-outline">
                                                <div class="card-header">
                                                <h5 class="m-0"> Day {{ $data->day }} - {{ $data->itinerary_title }}</h5>
                                                </div>
                                                <div class="card-body">

                                                {{-- test --}}

                                                <div class="row masonry-item">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 masonry">
                                       <div class="">

                                <div class="row ">
                                <div class="col-lg-7">
                                <div class="hotel-diss">

                               <p>{{ $data->itinerary_description }}</p>                                 <hr>                                         <div class="row">                   
                                <div class="col-md-6 col-lg-6 col-sm-12">                                    
                                  <div class="rating">                                                                            <h4>Destination</h4>                                                        </div>                                                                        
                                  <a class="map-viw" href="#"><i class="fa fa-map-marker"></i> {{ $data->destination_name }}</a>     
                                   </div>                                                                                                                               
                                <div class="col-md-6 col-lg-6 col-sm-12">                              
                                <div class="rating">                                                                          <h4>Accommodation</h4>                                                                        </div>                                                                        <a class="map-viw" href="#"><i class="fa fa-home"></i> {{ $data->accommodation_name }}</a>                                              </div>
                                                  </div>
                                                 </div>
                                               </div>
                                        <div class="col-lg-5">                           <div class="hotel-pics-one">                                                <img src="{{URL::asset('/storage/uploads/'.$data->attachment) }}" alt="" style=" height:200px !important">                                                                        </div>                                                  </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                {{-- test --}}
                                            </div>
                                            </div>
                                            @endforeach
                        </div>

<div id="tabA" class="tabcontent">
 <p>Photo Comes Here</p>
                            <p><b>Accomodation Name: </b>
                              {{ $data->accommodation_name }}</p>
                            <p><b>Description: {{ $data->accommodation_descriptions}}</b></p>
                            <p><b>Category: {{ $data->category}}</b></p>
</div>

<div id="tabC" class="tabcontent">

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
          <th class="title" colspan="8" style="background-color:white"><b>BASIC LEVEL ACCOMODATIONS</b></th>
        </tr>
        <tr>
           <th class="title" colspan="2"></th>
          <th class="title" colspan="6"><b>PRICE PER PERSON IN USD<b></th>
        </tr>
        <tr>
        <th>#</th>
          <th>Season</th>
           <th>Program</th>
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
                    <td><a href="{{ route('tourcostsummary.show',$datab->id) }}"> {{ $datab->season}}</a></td>
                   <td>{{ $datab->program }}</td>
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
          <th class="title" colspan="8" style="background-color:white"><b>COMFORT LEVEL ACCOMODATIONS</b></th>
        </tr>
        <tr>
           <th class="title" colspan="2"></th>
          <th class="title" colspan="6"><b>PRICE PER PERSON IN USD</b></th>
        </tr>
        <tr>
         <th>#</th>
          <th>Season</th>
           <th>Program</th>
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
                    <td><a href="{{ route('tourcostsummary.show',$datac->id) }}"> {{ $datac->season}}</a></td>
                   <td>{{ $datac->program }}</td>
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
          <th class="title" colspan="8" style="background-color:white"><b>DELUXE LEVEL ACCOMODATIONS</b></th>
        </tr>
        <tr>
           <th class="title" colspan="2"></th>
          <th class="title" colspan="6"><b>PRICE PER PERSON IN USD</b></th>
        </tr>
        <tr>
             <th>#</th>
          <th>Season</th>
           <th>Program</th>
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
                    <td><a href="{{ route('tourcostsummary.show',$datal->id) }}"> {{ $datal->season}}</a></td>
                   <td>{{ $datal->program }}</td>
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
                        <div id="tabE" class="tabcontent">
                             <p>Photo Comes Here</p>
                            <p><b>Accomodation Name: </b>
                              {{ $data->accommodation_name }}</p>
                            <p><b>Description: {{ $data->accommodation_descriptions}}</b></p>
                            <p><b>Category: {{ $data->category}}</b></p>
                        </div>

                    </div>
                    </div>
{{-- End of tabs --}}
                    {{-- Tour Summury sidebar --}}
                    <div class="col-md-3 col-lg-3 masonry">
                        <div class="card">
                        <div class="card-body">
                            <div >
                                <h4 class="text-secondary"> Tour Summary</h4>
                            </div>
                            <div>Name: <b>{{ $programs->tour_name }}</b></div>
                            <div>Type: <b>{{ $programs->type }}</b></div>
                            <div>Style: <b>{{ $programs->style }}</b></div>
                            <div>Duration: <b>{{ $programs->days }} Days</b></div>
                            <div>Countries: <b>Tanzania</b> </div>
                            <div>Destinations:
                                @foreach($datas as $destnation)
                               <span class="text-primary " style="font-size: 12px; border-right:solid 1px #ddd; padding-right:2px"> {{ $destnation->destination_name }}</span>
                                @endforeach
                        </div>

                        <hr>
                        <div class="row">
                          
                            <div class="col-lg-12 text-center">
                             @if($programs->payee_status !='Paid')
                              <a href="#" role="button" class="btn btn-success text-center" data-toggle="modal" data-target="#payNow">Pay Now</a>
                            @else
                            <p style="font-style: color:red"><span class="text-primary">Invoice  Alread Paid</span></p>
                              @endif
                            </div>


                            </div>
                            <hr>                            
                            <div class="row">
                            <div class="col-lg-12 text-center">
                            <a href="#" role="button" class="btn btn-secondary text-center" data-toggle="modal" data-target="#bookNow">Print Invoice</a>
                            </div>
                            </div>
                    </div>
                    </div>
{{-- End of tour summary sidebar --}}

                </div>
                
                </div>

                </div>
            </div>

        </div>
    </div>
    </section>


{{-- Modal for paying bill form --}}
<!-- Modal -->
<div class="modal fade" id="payNow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $programs->tour_name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      <form  method="post" id="post_form" action="/privatePay/{{ $tourInvoice->id}}">
    @csrf
    <div class="row">      
     <div class="col-md-6">
        <div class="form-group">
            <label for="">Amount:</label>
          <input type="number" class="form-control" placeholder="0.00" name="amount" value="">
        </div>
     </div>

     <div class="col-md-6">
        <div class="form-group">
      <label for="">Payment Date:</label>
      <div class="form-group date input-datepicker">
          <input type="date" class="form-control" name="payee_date"
              data-date-format="yyyy-mm-dd" placeholder="payment date" value="<?php echo date("Y-m-d");?>">
                        <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
      </div>

     </div>
     </div>

        </div>
        </div>


<div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Pay</button>
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



  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Itinerary Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Itinerary</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class=" container-fluid content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Edit Itinerary
                </h3>
              </div>


              <div class="card-body">
            <div class="card-body">
                <div class="card">

                    <div class="card-body">
                      <h4 class="card-title">{{ $programs->tour_name }}</h4>
                      <p class="card-text">
                        {{ $programs->itinerary_summury }}
                      </p>
                   </div>
                   
                    @foreach ($datas as $data)
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                          <h5 class="m-0"> Day {{ $data->day }} - {{ $data->itinerary_title }}</h5>
                        </div>
                        <div class="card-body">
                          <p class="card-text">{{ $data->itinerary_description }}</p>
                          <p class="">
                            
                            <p class=""><span class=""> Destination: </span><b>{{ $data->destination_name }} </b></p>

                              <p class=""><span class=""> Distance: </span><b>{{ $data->distance }} </b>Km</p>
                                <p class=""><span class=""> Transport: </span><b>{{ $data->transport }} </b></p>
                                  <p class=""><span class=""> Destination: </span><b>{{ $data->destination_name }} </b></p>
                                  <span class=""> Accommodation: </span><b>{{ $data->accommodation_name }} </b></p>
                               <span class=""> Meal Plan: </span><b>{{ $data->meal }} </b></p>

                          <a href="{{ route('itineraries.edit',$data->id) }}" class="btn btn-primary float-right">Edit</a>
                        </div>
                      </div>
                      @endforeach
                  </div>
              </div>
          </div>

              <div class="container-fluid x_content">
                <br />
               
              <form  method="post" id="post_form" action="{{ route('updateItenary') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                
                    <div class="row">                    
                    <input type="hidden" name="tour_addon" value="{{$tour_addon}}">
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="days" value="{{ $programs->days }}">
                    <input type="hidden" name="program_id" value="{{ $id }}">
                    <input type="hidden" name="unfilledDays" value="{{ $unfilledDays }}">
                  </div> 
                        
                 
   <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-md-2 col-form-label">Itinerary Summury</label>
                          <div class="col-sm-10 col-md-10">
                            <textarea  class="form-control" name="itinerary_summury"  cols="30" rows="3" maxlength="490">
                             {{ $programs->itinerary_summury }} 
                            </textarea>
                          </div>
                            </div>
    </div>
    </div>
                              <div class="row">                                     
                                                  
                        @for($i =$filledDays +1; $i <= $unfilledDays +$filledDays; $i++)
                         <p class="text-center"><b style="color:green">Incomplete Day {{$i}}</b></p>
                        {{-- Days Itinerary --}}
                        <div class="col-12" id="accordion">
                            <div class="card">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapse{{ $i }}">
                                    <div class="card-header bg-primary">
                                        <h4 class="card-title w-100">
                                           Day {{ $i }}
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapse{{ $i }}" class="collapse @if($i==1)show @endif" data-parent="#accordion">
                                    <div class="color-palette-set">
                                        <div class="bg-primary disabled color-palette">
                                    <div class="card-body">
                                      {{-- Days  data  starts here --}}

            <div class="row" style="padding:10px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Days {{ $i }} Title </label>
                      <div class="col-sm-10">
                        <input type="hidden" name="day[]" value="{{ $i }}">
                        <input type="text" name="itinerary_title[]" class="form-control" placeholder="Day {{ $i }} title">
                      </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-md-2 col-form-label">Day {{ $i }} Description</label>
                          <div class="col-sm-10 col-md-10">
                            <textarea name="itinerary_description[]" class="form-control" cols="30" rows="2"></textarea>
                          </div>
                            </div>
                    </div>

                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Destination</label>
                              <div class="col-sm-8 col-md-8">
                                <select name="destination_id[]" id="" class="form-control"  required="">
                                    <option value="">--Select Destination--</option>
                                    @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}">{{ $destination->destination_name }}</option>
                                    @endforeach

                                </select>
                              </div>
                                </div>
                            </div>                  


   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Distance(KM)</label>
                        <div class="col-sm-6 col-md-8">
                         <input type="text" name="distance[]" class="form-control">
                        </div>
                          </div>
                      </div>


 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Trans.</label>
                        <div class="col-sm-8 col-md-8">
                          <select name="transport[]" id="" class="form-control"  required="">
                              <option value="">--Transport--</option>
                             <option>Bike riding</option>
                              <option>Camel</option>
                             <option>Canoeing</option>
                             <option>Walking Safaris</option>

                             <option>Horse Riding</option>
                             <option>Boat</option>
                              <option>Bus</option>
                             <option>Ballon</option>
                             <option>Flight</option>

                            <option>Safari Land Cruiser</option>
                             <option>Mini-Bus/Min-Van</option>
                              <option>Min-Van</option>
                              <option>Overland Truck</option>
                          </select>
                        </div>
                          </div>
                      </div>

                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Accommodation</label>
                        <div class="col-sm-8 col-md-8">
                          <select name="accommodation_id[]" id="" class="form-control"  required="">
                              <option value="">--Select Accommodation--</option>
                              @foreach ($accommodations as $accommodation)
                            <option value="{{$accommodation->id }}">{{ $accommodation->accommodation_name }}</option>
                              @endforeach
                          </select>
                        </div>
                          </div>
                      </div>

                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group row">
                        <label for="mealplan" class="col-sm-4 col-md-4 col-form-label">Meal Plan</label>
                        <div class="col-sm-8 col-md-8">
                          <select name="meal[]" id="" class="form-control"  required="">
                              <option value="">--Meal Plan--</option>
                             <option>Breakfast</option>
                            <option>Lunch</option>
                            <option>Dinner</option>
                            <option>Breakfast,Lunch</option>
                            <option>Breakfast,Lunch,Dinner</option>
                          </select>
                        </div>
                          </div>
                      </div>
                        </div>
                        </div>
                          </div>
                        {{-- Days data ends here --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor

                         </div>

          <div class="form-group row">
          <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
                <a href="/programs" role="button" class="btn btn-success float-left">Return to List</a>
                <button type="submit" class="btn btn-primary float-right">Update</button>
              </div>
                  </div>
                </div>
            </form>
          <!-- /.col-->
        </div>
    </section>
  </div>

@endsection

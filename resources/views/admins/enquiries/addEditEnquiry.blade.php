
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Enquiry Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Route attachment</li>
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
              </div>
              <div class="container-fluid x_content">
                    
                    <form  method="POST"  action="{{ route('enquiry.update',$id) }}" enctype="multipart/form-data">
                         @method('PATCH')
                             @csrf
                             
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <label for="">First name:</label>
                                    <div class="form-group">     <input type="hidden" class="form-control" name="price" value="">
                                   <input type="hidden" class="form-control" name="currency" value="">       
                                   <input type="hidden" class="form-control" name="id" value="{{$tailorMades->id}}">

                                        <input type="text" name="first_name" value="{{$tailorMades->first_name}}" min="2">
                                    </div>
                                </div>

                                 <div class="col-lg-5 col-md-12 col-sm-12">
                                    <label for="">Last name:</label>
                                    <div class="form-group">   
                                                                 
                                    <input type="text" name="last_name" value="{{$tailorMades->last_name}}" min="2">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <label for="">Nationality:</label>
                                    <div class="form-group">
                                        <input type="text" name="nationality" value="{{$tailorMades->country}}" min="2">
                                    </div>
                                </div>
                                  <div class="col-lg-5 col-md-12 col-sm-12">
                                     <label for="">Email:</label>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" value="{{$tailorMades->email}}">
                                    </div>
                                </div>

                                  <div class="col-lg-5 col-md-12 col-sm-12">
                                     <label for="">Phone:</label>
                                    <div class="form-group">
                                        <input type="phone" class="form-control" name="phone" value="{{$tailorMades->phone}}">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                   <label for="">Arrival Date:</label>
                                    <div class="form-group  input-datepicker">
                                        <input type="date" class="form-control "  name="arrival_date"
                                            data-date-format="dd-m-yyyy" value="{{$tailorMades->arrival_date}}">
                                        <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                         
                                  <div class="col-lg-3 col-md-6 col-sm-12">
                                   <label for="">Adults(>16yrs):</label>
                                    <div class="form-group">
                                        <input type="number" class="zt-control" value="{{$tailorMades->adults}}" name="adults" min="0">
                                    </div>
                                  </div>
                                
                                <div class="col-lg-2  col-md-6 col-sm-12 pl-0">
                                  <label for="">Teens(13-14yrs):</label>
                                    <div class="form-group">
                                        <input type="number" class="zt-control" value="{{$tailorMades->teens}}" name="teens" min="0">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                   <label for="">Children (5-12 yrs):</label>
                                    <div class="form-group">
                                        <input type="number" class="zt-control" value="{{$tailorMades->children}}" name="children" min="0">
                                    </div>
                                </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
          <label for="">Tour of Interest:</label>
                                    <div class="form-group icon_down">
                                        <select class="selectpicker search-fields form-control" name="tour_id" required="">                                       
                                              <option value="{{$tours->id}}">{{$tours->id}}:{{$tours->tour_name}}</option>
                                              @foreach($tourTypes as $tourType)
                                            <option value="{{$tourType->id}}">{{$tourType->id}}:{{$tourType->tour_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                         
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                     <label for="">Accomodation:</label>
                                    <div class="form-group icon_down">                                     
                                        <select class="selectpicker search-fields form-control" name="accomodation">
                                           <option value="{{$tailorMades->accomodation}}">{{$tailorMades->accomodation}}</option>
              <option value="Basic">Basic</option>
              <option value="Comfort">Comfort</option>
                <option value="Deluxe">Deluxe</option>
              <option value="Mix">Mix</option>
              <option value="Not sure">Not sure</option>
                                        </select>
                                    </div>
                                </div>
                                          

            <div class="col-md-12">
               <label for="">Your Enquiry</label>
                <div class="form-group"> 
         <textarea rows="3" name="other_information" style="width:  100%"> {{$tailorMades->enquiry}}</textarea>
        </div>
        </div>

                                 
                                   <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-success float-right">Update</button>
                                </div>       
                              
                              </form>

    </section>
  </div>
@endsection

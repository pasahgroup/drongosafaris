
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Book for: {{$enquiries->first_name}} {{$enquiries->last_name}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Help to Book for <b>{{$enquiries->first_name}} {{$enquiries->last_name}}</b></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class=" container-fluid content">
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
          <input type="text" class="form-control" value="{{$enquiries->first_name}}" min="1" max="22" name="first_name">
        </div>
     </div>
     <div class="col-md-6">
        <div class="form-group">
            <label for="">Last Name:</label>
          <input type="text" class="form-control" value="{{$enquiries->last_name}}" min="1" max="22" name="last_name">
        </div>
     </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="">Email:</label>
          <input type="email" class="form-control" value="{{$enquiries->email}}" min="1" max="62" name="email">
        </div>
     </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="">Country:</label>
          <input type="text" class="form-control" value="{{$enquiries->country}}" name="country">
        </div>
     </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="">Phone:</label>
          <input type="number" class="form-control" value="{{$enquiries->phone}}" min="0"  name="phone">
        </div>
     </div>

    
        <div class="col-md-6">
        <div class="form-group">
            <label for="">Tour Name:</label>  

          <select class="form-control" name="tour_id">
              @foreach($tours as $tour)
              <option value="{{$tour->id}}">{{$tour->tour_name}}
              </option>
              @endforeach
          </select>
        </div>
        </div>
     

     <div class="col-md-6">
        <div class="form-group">
            <label for="">Accommodations:</label>
         <select class="selectpicker search-fields form-control" name="accomodation">
              <option value="{{$enquiries->accomodation}}">{{$enquiries->accomodation}}</option>
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
            <label for="">Arrival Date:</label>
           <div class="form-group date input-datepicker">
          <input type="date" class="form-control" name="travel_date"
              data-date-format="dd-mm-yyyy" value="{{$enquiries->arrival_date}}">
          <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
      </div>
     </div>
     </div>


     <div class="col-md-6">
        <div class="form-group">
            <label for=""> No of Adults(>16yrs):</label>
          <input type="number" class="form-control" value="{{$enquiries->adults}}"  min="0" name="adults">
        </div>
           </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for=""> No of Teens(13-14yrs):</label>
          <input type="number" class="form-control" value="{{$enquiries->teens}}" min="0" name="teens">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for=""> Number of Children (5-12 yrs):</label>
          <input type="number" class="form-control" value="{{$enquiries->children}}" min="0" name="children">
        </div>
        </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="">  Additional Information we should know?</label>

         <textarea class="form-control" id="" cols="2" rows="2" name="additional_information">{{$enquiries->enquiry}}</textarea>
        </div>
     </div>
  
        </div>
        </div>


<div class="modal-footer">
  <a href="/enquiry" type="button" class="btn btn-success float-left">Return to List</a>
  <button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>

    </section>
  </div>
@endsection

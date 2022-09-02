
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Main content -->
    <section class=" container-fluid content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
             <div class="container-fluid x_content">              
              
              <form  method="post" action="/inclusiveUpdate/{{$id}}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                
                @foreach($programs as $program)
               <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                  <div>
                    <label>Tour Name</label>
                    <input class="form-control" type="text" name="tour_name" placeholder="Program Name" value="{{$program->tour_name}}">
                  </div>                 
                  @endforeach            
       <hr>
       <div class="form-group row">
              <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
              <button type="submit" class="btn btn-primary float-right" name="inclusiveUpdate" value="save page">Update</button>         
              </div>
                </div>
                </div>
        </div>               
        </form>

           <form  method="post" id="post_form" action="{{ route('page.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
              @csrf   
          </form>     
     <div class="row">
     <div class="col-12 border">
      <p><b class="text-secondary">Select Accommodation from list to Include in the Tour Name</b></p>
     </div>
        <div class="col-6 border">
          <h5>Select From List</h5>
          <form method="post" action="{{route('inclusive.store')}}">
            @csrf
          @foreach($inclusives as $inclusive)         
          <input type="hidden" name="tour_id" value="{{$id}}">          
          <button type="submit" class="btn btn-secondary text-left" style="margin-bottom: 2px; min-width: 400px;" name="assign" value="{{$inclusive->id}}">
          {{$inclusive->inclusive}}     <span class="fa fa-angle-right float-right"></span></button>
          <br>
          @endforeach
          </form>
          </div>

        <div class="col-6 border">
             <h5>Accommodation Inclusive</h5>
             @isset($assignLists)
            <form method="post" action="{{route('inclusive.destroy',$id)}}">
            @csrf

          <input type="hidden" name="_method" value="delete">
          @foreach($assignLists as $assignList)
          <input type="hidden" name="tour_id" value="{{$id}}">
          <button type="submit" class="btn btn-success text-right" style="margin-bottom: 2px; min-width: 400px;" name="assigned" value="{{$assignList->id}}">
          {{$assignList->inclusive}}     <span class="fa fa-angle-left float-left"></span></button>
          <br>
          @endforeach
          </form>
          @else
          <p class="alert alert-info text-center"><span class="fa fa-eye"> </span> No widget assigned</p>
          @endisset
        </div>
      </div>
            
        </div>
    </section>
    <section>
      <a href="/programs" role="button" class="btn btn-success float-right">Finish</a>
    </section>
  </div> 

@endsection

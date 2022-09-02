
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Attraction Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Attractions</li>
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
                  Add Attraction
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('Attraction.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                    <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Attraction </label>
                      <div class="col-sm-8 col-md-8">
                        <input type="text" class="form-control" name="attraction_title"  value="{{$attractions->attraction_title}}">
                      </div>
                        </div>
                    </div>


                                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group row">
                                      <label for="tour_circuit" class="col-sm-4 col-md-6 col-form-label">Tour Circuit</label>
                                      <div class="col-sm-8 col-md-6">
                                        <select name="tour_circuit" id="" class="form-control">
                                          <option>{{$attractions->tour_circuit}}</option>
                                          <option value="Northern Circuit">Northern Circuit</option>
                                          <option value="Southern Circuit">Southern Circuit</option>
                                          <option value="Eastern Circuit">Eastern Circuit</option>
                                            <option value="Western Circuit">Western Circuit</option>
                                             <option value="None">None</option>
                                        </select>
                                      </div>
                                        </div>
                                    </div>

                                     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group row">Type
                                      <div class="col-sm-8 col-md-6">
                                        <select name="type" id="" class="form-control">
                                          <option value="{{$attractions->type}}">{{$attractions->type}}</option>
                                          <option value="Wildlife">Wildlife</option>
                                          <option value="Geographical">Geographical</option>
                                          <option value="Historical">Historical</option>
                                            <option value="Culture & Belief">Culture & Belief</option>
                                            <option value="None">None</option>
                                        </select>
                                      </div>
                                        </div>
                                    </div>
                    </div>
                  <div class="col-md-12 col-sm-6 col-xs-12">
                      <label class="control-label" for="attraction_description">Description
                       </label>
                       <textarea name="attraction_description" class="form-control" maxlength="4000">{{$attractions->attraction_description}}</textarea>

                  </div>  
              
                <hr>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Image</label>
                    <input name="attachment[]" type="file" id="main_img" multiple value="attachment">
             </div>

                </div>

                <div class="form-group row">
          <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
                 <a href="/Attraction" class="btn btn-success float-left">Attraction List</a>
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

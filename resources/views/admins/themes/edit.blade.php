
  @extends('admins.layouts.Apps.app')
  @section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editing Slider Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Editing Slider Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class=" container-fluid content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Editing Slider Page
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('themes.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
               @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label for="inputEmail3">Title</label>
                                 <div class="form-group row">                        
                                <div class="col-sm-12 col-md-12">
                                  <div class="form-group row">
                                    <input type="text" name="title" class="form-control" value="{{$sliders->title}}">
                                        </div>
                                </div>
                                  </div>
                          </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="inputEmail3">Description </label>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                             <textarea class="form-control" name="description" cols="30" rows="2">{{ $sliders->description}}</textarea>
                          </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

                            <label for="inputEmail3">Tour Name</label>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12">

                              <select name="tour_id" id="" class="form-control">
                              <option value="{{$sliders->tour_id}}">{{$sliders->tour_name}}</option>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id }}">{{ $tour->tour_name }}</option>
                            @endforeach                           
                            </select>

                                </div>
                              </div>
                        </div>

                          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                            <label for="inputEmail3">Status</label>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12">

                            <select name="status" id="status" class="form-control">
                              <option value="{{$sliders->status}}">{{$sliders->status}}</option>
                         
                                <option value="0">0</option>
                                <option value="1">1</option>                  
                            </select>

                                </div>
                              </div>
                        </div>
                     
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">

                            <label for="inputEmail3">Image</label>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12">
                                  <div class="form-group row">
                                   <input type="file" name="attachment">
                                  </div>
                                </div>
                                </div>
                           </div>


                  <div class="col-md-1 col-lg-1 col-sm-12 col-xs-12 col-md-offset-3">
                      <div class="form-group row">
                     <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
            </div>

            </form>
          <!-- /.col-->
        </div>
    </section>  
  </div>
  <!-- /.content-wrapper -->
@endsection


  @extends('admins.layouts.Apps.app')
  @section('contents')
   <style type="text/css">    
    .red {
    color: red;
    }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slider Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider Page</li>
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
                  New Slider
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('themes.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <label for="inputEmail3">Title</label>
                                 <div class="row">                        
                                <div class="col-lg-12 col-md-12 col-sm-12 ">
                                  <div class="form-group">
                                    <input type="text" name="title" id="" class="form-control" placeholder="Slider title">
                                        </div>
                                </div>
                                  </div>
                          </div>

                          
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <label for="inputEmail3">Description </label>
                                                
                          <div class="col-lg-12 col-md-12 col-sm-12 ">
                             <textarea name="description" id="" cols="38" rows="2" placeholder="Descriptions" maxlength="830"></textarea>
                          </div>
                        </div>
                  </div>
                    
                        <div class="row">
                           <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">

                            <label for="inputEmail3">Status</label>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12">

                              <select name="status" id="status" class="form-control">
                              <option value="">--Select Status--</option>
                         
                                <option value="0">0</option>
                                <option value="1">1</option>                  
                            </select>
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">

                            <label for="inputEmail3">Tour Name</label>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12">

                              <select name="tour_id" id="" class="form-control">
                              <option value="">Select Tour name</option>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id }}">{{ $tour->tour_name }}</option>
                            @endforeach                           
                            </select>

                                </div>
                              </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                            <label for="inputEmail3">Image</label>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12">
                                  <div class="form-group row">
                                   <input type="file" name="attachment" required>
                                  </div>
                                </div>
                                </div>
                           </div>


                  <div class="col-md-1 col-lg-1 col-sm-12 col-xs-12 col-md-offset-3">
                      <div class="form-group row">
                     <button type="submit" class="btn btn-primary">Save</button>
             </div>
                </div>
            </div>

            </form>
          <!-- /.col-->
        </div>
    </section>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Slider</h3>

        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Tour name</th>
                    <th>Attachment</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($sliders as $slide)
                  <tr>
                        <td>{{$slide->id  }}</td>
                        <td>{{$slide->title  }}</td>
                        <td>{{$slide->description  }}</td>
                        <td>{{$slide->tour_name  }}</td>
                        <td>{{$slide->attachment  }}</td>
                        <td>{{$slide->status  }}</td>
                        <td><a href="{{ route('themes.edit',$slide->id) }}"><i class="fa fa-edit"></i></a>  <a href="/themes-destroy/{{$slide->id}}" onclick="return confirm('Are you sure? You want to delete {{ $slide->tour_name}}','Inclusive')"><i class="fa fa-trash red"></i></a></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

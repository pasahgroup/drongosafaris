
  @extends('admins.layouts.Apps.app')
  @section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Popular Experience Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Popular ExperiencePage</li>
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
                  New Popular Experience
                </h3>
              </div>
              <div class="container-fluid x_content">
              
           <form  method="post" id="post_form" action="{{ route('sales.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                    <div class="row">
                   
                      <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label for="tour_name" class="col-form-label">Tour name</label>
                        
                            <select name="tour_id" id="" class="form-control">
                              <option value="">Select Tour</option>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id }}">{{ $tour->tour_name }} : <b>{{ $tour->type }}</b></option>
                            @endforeach                           
                            </select>
                          </div>
                        </div>
           <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            </div>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label for="srs" class="col-form-label">Description</label>
                         
                           <div class="form-group row">
                                 <textarea name="descriptions" id="" cols="40" rows="2" placeholder="Decribe this popular experience..."></textarea>

                          </div>
                         </div>
                        </div>

            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            </div>
                   
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                 <label for="" class="col-form-label">..........</label>       

                <div class="form-group row">                 
                <button type="submit" class="btn btn-primary float-right">Save</button>
           
             </div>
            </div>
            </div>

            </form>
        </div>
    </section>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Popular Experience</h3>

        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Tour Name</th>
                    <th>Descriptions</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                    <td><a href="/editPopularExperience/{{$data->id}}"> {{ $data->tour_name }}</a></td>
                    <td>{{ $data->descriptions }}</td>  
                      <td><a href="/editPopularExperience/{{$data->id}}"><i class="fa fa-edit"></i></a> <a href="#"><i class="fa fa-trash"></i></a></td>                 
                   
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

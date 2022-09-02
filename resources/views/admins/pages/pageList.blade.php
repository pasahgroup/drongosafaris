
  @extends('admins.layouts.Apps.app')
  @section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Widgets List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Page List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lists of Widgets</h3>

          <div class="card-tools">
            <a href="/widget" class="btn btn-primary" >
              <i class="fas fa-plus"></i>New Widget
            </a>
          </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Widget Name</th>                 
                    <th>Widget Description</th> 
                    <th>Action</th>              
                  </tr>
                  </thead>
                  <tbody>
                   
                    @foreach ($widgets as $data)
                            <tr>
                    <td>{{ $data->id }}</td>
                     <td><a href="/editWidget/{{$data->id}}">{{ $data->widget_name }}</a></td>                   
                    <td>{{ $data->widget_descriptions }}</td>
                    <td><a href="/editWidget/{{$data->id}}"><i class="fa fa-edit"></i></a> <a href="#"><i class="fa fa-trash red"></i></a></td>
                                </tr>
                     @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                   <th>#</th>
                     <th>Widget Name</th>                 
                    <th>Widget Description</th>                   
                    <th>Action</th>     
                  </tr>
                  </tfoot>
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

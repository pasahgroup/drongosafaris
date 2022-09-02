
  @extends('admins.layouts.Apps.app')
  @section('contents')
   <style type="text/css">
    .red{
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
            <h1>Locations Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Locations Page</li>
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
          <h3 class="card-title">Locations</h3>

          <div class="card-tools">
            <a href="{{ route('locations.create') }}" class="btn btn-primary" >
              <i class="fas fa-plus"></i> Locations
            </a>
          </div>
        </div>
        <div class="card-body">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Location Name</th>
                  <th>Country</th>
                  <th>Region</th>
                  <th>District</th>
                  <th>Ward / Town</th>
                  <th>GPS</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
          @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                  <td>{{ $data->location_name }}</td>
                  <td>{{ $data->country }}</td>
                  <td>{{ $data->region }}</td>
                  <td>{{ $data->district }}</td>
                  <td>{{ $data->ward_town }}</td>
                  <td>{{ $data->lat }},{{ $data->long }}</td>
                   <td><a href="{{ route('location-edit',$data->id) }}"><i class="fa fa-edit"></i></a> 
                    <a href="{{ route('location-Destroy',$data->id) }}" onclick="return confirm('Are you sure? You want to delete location: {{ $data->location_name}} {{ $data->last_name}}','Destroy')"><i class="fa fa-trash red"></i></a></td>
                </tr>
             @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Location Name</th>
                    <th>Country</th>
                    <th>Region</th>
                    <th>District</th>
                    <th>Ward / Town</th>
                    <th>GPS</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>

        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

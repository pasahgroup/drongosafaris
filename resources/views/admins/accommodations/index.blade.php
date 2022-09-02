
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
            <h1>Accommodations Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Accommodations page</li>
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
          <h3 class="card-title">Accommodations</h3>

          <div class="card-tools">
            <a href="{{ route('accommodations.create') }}" class="btn btn-primary" >
              <i class="fas fa-plus"></i> Accommodations
            </a>
          </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Acc.Type</th>
                      <th>National Standard</th>
                    <th>Our Category</th>
                    <th>Phone</th>
                    <th>Email</th>
                     <th>Url</th>
                    <th>Location</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($datas as $data)    
                    {{$data->url}}                
                  <tr>
                    <td>{{ $data->id }}</td>
                    <td><a href="/editAccommodation/{{$data->id}}"> {{ $data->accommodation_name }}</a></td>
                    <td>{{ $data->accommodation_descriptions }}</td>
                    <td>{{ $data->price }}</td>
                    <td>{{ $data->category }}</td>
                    <td>{{ $data->national_standard }}</td>
                    <td>{{ $data->type }}</td>
                     <td>{{ $data->phone }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->url }}</td>
                    <td>{{ $data->location_name }}</td>             
                       <td><a href="{{ route('editAccommodation',$data->id) }}"><i class="fa fa-edit"></i></a> 
                    <a href="{{ route('accommodation-Destroy',$data->id) }}" onclick="return confirm('Are you sure? You want to delete Accommodation: {{ $data->destination_name}} {{ $data->category}}','Destroy')"><i class="fa fa-trash red"></i></a></td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Acc.Type</th>
                    <th>National Standard</th>
                    <th>Our Category</th>
                    <th>Phone</th>
                    <th>Email</th>
                     <th>Url</th>
                    <th>Location</th>
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

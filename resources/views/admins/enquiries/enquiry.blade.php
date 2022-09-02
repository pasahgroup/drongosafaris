
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
            <h1>Enquiry Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enquiry Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
               <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                     <th>Last Name</th>
                    <th>Nationality</th>

                    <th>Adults</th>
                    <th>Children</th>
                    <th>Teens</th>
                    <th>Tour Name</th>
                  <th>Accomodation</th>
                      <th>Days</th>
                    <th>Arrival Date</th>
                    <th>End Date</th>
                    <th>PIN Contorl</th>
                    <th>Status</th>                  
                     <th>Book</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                    <td><a href="/editEnquiry/{{$data->id}}">{{ $data->first_name }}</a></td>
                     <td>{{ $data->last_name }}</td>
                    <td>{{ $data->country }}</td>


                   <td>{{ $data->adults }}</td>
                    <td>{{ $data->children }}</td>
                    <td>{{ $data->teens }}</td>
                    <td>{{ $data->tour_name }}</td>
                    <td>{{ $data->accomodation }}</td>
                    <td>{{ $data->days }}</td> 
                    <td>{{ $data->arrival_date }}</td>
                    <td>{{ $data->end_date }}</td>
                    <td>{{ $data->pin }}</td>
                    <td>{{ $data->status }}</td>
                    <td><a href="{{ route('bookFor',$data->id) }}" class="btn btn-success">Book For</a></td>

                    <td><a href="/editEnquiry/{{$data->id}}"><i class="fa fa-edit"></i></a> 
                      <a href="{{ route('enquiryDestroy',$data->id) }} " onclick="return confirm('Are you sure? You want to delete {{ $data->first_name}} {{ $data->first_name}} Program','Tailor made')"><i class="fa fa-trash red"></i></a></td>
                  </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                      <th>#</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                    <th>Nationality</th>
                    
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Teens</th>
                    <th>Tour Name</th>
                     <th>Accomodation</th>
                     <th>Days</th>
                    <th>Arrival Date</th>
                    <th>End Date</th>
                     <th>PIN Contorl</th>
                    <th>Status</th>
                    <th>Book</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>

        </div>
        <!-- /.card-body -->
        <div class="footer">
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

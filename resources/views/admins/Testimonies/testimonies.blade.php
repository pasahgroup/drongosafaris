
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
            <h1>Testimonies Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Testimonies Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class=" container-fluid content">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Add New Testimony
                </h3>
              </div>
            </div>
          </div>
            <div class="col-md-6">
            <div class="card card-outline card-info">
              <div class="card-header">
                <a href="/Testimony-create" role="button" class="btn btn-primary float-right">Add Testmony</a>
              </div>
            </div>
          </div>
    </section>


    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Testimonies List</h3>

        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>                  
                    <th>Comment</th>
                    <th>Rating Level</th>
                     <th>Status</th> 
                      <th>Date</th>
                      <th>Action</th>                      
                     </tr>
                  </thead>
                  <tbody>
                     
                @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                    <td><a href="#"> {{ $data->full_name }}</a></td>
                    <td>{{ $data->comments }}</td>
                    <td>{{ $data->rating }}</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->created_at }} </td>
                    <td><a href="{{ route('TestimoniesEdit',$data->id) }}"><i class="fa fa-edit"></i></a> 
                      <a href="{{ route('TestimoniesDestroy',$data->id) }}" onclick="return confirm('Are you sure? You want to delete {{ $data->tour_name}}','Inclusive')"><i class="fa fa-trash red"></i></a></td>
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
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

<script type="text/javascript">
  
  function getComboA(selectObject) {
  var value = selectObject.value;  
  console.log(value);
}
</script>
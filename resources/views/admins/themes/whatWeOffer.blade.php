
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
            <h1>What We Offer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">What We Offer page</li>
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
          <h3 class="card-title">What We Offer entry which displays on What We Offer Page</h3>

          <div class="card-tools">
            <a href="{{ route('Service.index') }}" class="btn btn-primary" >
              <i class="fas fa-plus"></i>New Entry
            </a>
          </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Message</th> 
                    <th>Action</th>              
                  </tr>
                  </thead>
                  <tbody>
                   
                    @foreach ($Postcategory as $data)
                            <tr>
                    <td>{{ $data->id }}</td>
                     <td><a href="/editWhatWeOffer">{{ $data->title }}</a></td>
                    <td>{{ $data->category }}</td>
                    <td>{{ $data->body }}</td>
                   
                    <td><a href="/editWhatWeOffer/{{$data->id}}"><i class="fa fa-edit"></i></a>  <a href="/whatWeOffer-Destroy/{{$data->id}}" onclick="return confirm('Are you sure? You want to delete {{ $data->title}}','Inclusive')"><i class="fa fa-trash red"></i></a></td>
                                </tr>
                     @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                   <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Message</th>
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

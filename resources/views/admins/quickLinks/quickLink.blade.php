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
            <h1>Quick Link Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quick Link Page</li>
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
          <h3 class="card-title">Page</h3>

          <div class="card-tools">
            <a href="{{ route('quickLink.create') }}" class="btn btn-primary" >
              <i class="fas fa-plus"></i> Page
            </a>
          </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Page Type</th> 
                    <th>Title</th>                  
                    <th>Description</th>
                    <th>Url</th>
                    <th>Slider</th>
                    <th>Attachment</th>                 
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                     <td><a href="{{ route('EditQuickLink',$data->id) }}">{{ $data->page_type }}</a></td> 
                    <td>{{ $data->quick_title }}</td>                    
                    <td>{{ $data->quick_description }}</td>
                     <td>{{ $data->url }}</td>
                     <td>{{ $data->slider }}</td>
                    <td>{{ $data->attachment }}</td>
                    <!-- <td><a href="{{ route('EditQuickLink',$data->id) }}"><i class="fa fa-edit"></i></a> <a href="#"><i class="fa fa-trash"></i></a></td>
                   -->
                    <td><a href="{{ route('EditQuickLink',$data->id) }}"><i class="fa fa-edit"></i></a> 
                    <a href="{{ route('QuickLink-Destroy',$data->id) }}" onclick="return confirm('Are you sure? You want to delete: {{ $data->quick_title}}','Destroy')"><i class="fa fa-trash red"></i></a></td>
                  

                  </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                   <th>#</th>
                    <th>Page Type</th> 
                    <th>Title</th>                  
                    <th>Description</th>
                    <th>Url</th>
                    <th>Slider</th>
                    <th>Attachment</th>                 
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

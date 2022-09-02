
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
            <h1>Titles,Static Images and Mesages</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Titles,Static Images and Mesages page</li>
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
          <h3 class="card-title">Lists of Titles,Static Images and Mesages page</h3>

          <div class="card-tools">
            <a href="{{ route('titles.create') }}" class="btn btn-primary" >
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
                    <th>Body</th> 
                    <th>Action</th>              
                  </tr>
                  </thead>
                  <tbody>
                   
                    @foreach ($titles as $data)
                            <tr>
                    <td>{{ $data->id }}</td>
                     <td><a href="{{ route('titles.edit',$data->id) }}">{{ $data->title }}</a></td>                   
                    <td>{{ $data->body }}</td>
                       <td><a href="{{ route('titles.edit',$data->id) }}"><i class="fa fa-edit"></i></a> 
                         <a href="/destroy-titles/{{$data->id}}" onclick="return confirm('Are you sure? You want to delete: {{ $data->title}}','Destroy')"><i class="fa fa-trash red"></i></a></td>
                                </tr>
                     @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                   <th>#</th>
                    <th>Title</th>
                    <th>Body</th>                   
                    <th>Action</th>     
                  </tr>
                  </tfoot>
                </table>
              </div>

        </div>
      </div>
          </section>
  </div>
  <!-- /.content-wrapper -->
@endsection

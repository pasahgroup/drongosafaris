
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
            <h1>User List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                           <a href="/new-user" class="btn btn-primary"> <i class="fa fas fa-plus"></i> Add user</a>
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
                    <th>Full name</th>
                    <th>Email</th>
                     <th>Photo</th>
                    <th>Role</th>
                    <th>Status</th>
                     <th>Updated at</th>  
                     <th>Action</th>                   
                   
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                    <td><a href="{{ route('user-show',$data->id) }}">{{ $data->name }}</a></td>
                    <td>{{ $data->email }}</td>
                      <td><div class="logo mr-auto"><img src="{{ URL::asset('/storage/user/'.$data->photo) }}" width="60" height="40"></div></td>
                    <td>{{ $data->role }}</td>
                    <td>{{ $data->status }}</td>
                     <td>{{ $data->updated_at }}</td>
                    <td><a href="{{ route('user-show',$data->id) }}"><i class="fa fa-edit"></i></a> 
                    <a href="{{ route('user-destroy',$data->id) }}" onclick="return confirm('Are you sure? You want to delete User: {{ $data->name}}','Destroy')"><i class="fa fa-trash red"></i></a></td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                   <tr>
                   <th>#</th>
                    <th>Full name</th>
                    <th>Email</th>
                     <th>Photo</th>
                    <th>Role</th>
                    <th>Status</th>
                     <th>Updated at</th>  
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

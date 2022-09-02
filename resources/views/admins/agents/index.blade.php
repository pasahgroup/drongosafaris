
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
            <h1>Agent List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Agent page</li>
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
                    <th>First name</th>
                    <th>Last name</th>
                     <th>Photo</th>
                    <th>Nationality</th>
                    <th>Language</th>
                    <th>Phone</th>
                    <th>Email</th>
                    
                     <th>PIN</th>
                     <th>commisioner_percent</th>
                     <th>commisioner_desc</th>  
                     <th>Action</th>                   
                   
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                    <td><a href="{{ route('New-Agent-show',$data->id) }}">{{ $data->first_name }}</a></td>
                    <td>{{ $data->last_name }}</td>
                      <td><div class="logo mr-auto"><img src="{{ URL::asset('/storage/agents/'.$data->photo) }}" width="60" height="40"></div></td>
                    <td>{{ $data->nationality }}</td>
                    <td><span class="badge"> {{ $data->language }}</span></td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->email }}</td>
                   
                  
                     <td>{{ $data->pin }}</td>
                     <td>{{ $data->commisioner_percent }}</td>
                      <td>{{ $data->commisioner_desc }}</td>
                    <td><a href="{{ route('New-Agent-show',$data->id) }}"><i class="fa fa-edit"></i></a> 
                    <a href="{{ route('Agent-Destroy',$data->id) }}" onclick="return confirm('Are you sure? You want to delete Agent: {{ $data->first_name}} {{ $data->last_name}}','Destroy')"><i class="fa fa-trash red"></i></a></td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                   <tr>
                    <th>#</th>
                    <th>First name</th>
                    <th>Last name</th>
                     <th>Photo</th>
                    <th>Nationality</th>
                    <th>Language</th>
                    <th>Phone</th>
                    <th>Email</th>
                    
                    <td>PIN</td> 
                     <th>commisioner_percent</th>
                    
                     <th>commisioner_desc</th>  
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

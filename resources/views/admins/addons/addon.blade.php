
  @extends('admins.layouts.Apps.app')
  @section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Addon Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Addon Page</li>
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
          <h3 class="card-title">Addon</h3>

          <div class="card-tools">
            <a href="{{ route('add-ons.create') }}" class="btn btn-primary" >
              <i class="fas fa-plus"></i> Addon
            </a>
          </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Addon</th>
                    <th>Days</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Style</th>
                    <th>Overview</th>
                    <th>Highlight</th>
                    <th>SEO</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                      @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                    <td><a href="{{ route('add-ons.show',$data->id) }}">{{ $data->addon_name }}</a></td>
                    <td>{{ $data->days }}</td>
                    <td>{{ $data->price }}<span class="badge"> {{ $data->currency }}</span></td>
                    <td>{{ $data->category }}</td>
                    <td>{{ $data->type }}</td>
                    <td>{{ $data->style }}</td>
                    <td>{{ $data->overview }}</td>
                    <td>{{ $data->addon_highlight }}</td>
                    <td>{{ $data->seo }}</td>
                  </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Addon</th>
                    <th>Days</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Style</th>
                    <th>Overview</th>
                    <th>Highlight</th>
                    <th>SEO</th>
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

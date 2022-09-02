
  @extends('admins.layouts.Apps.app')
  @section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Departures Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Departures Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class=" container-fluid content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Add New Departure
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('departures.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                    <div class="row">

                   
                      <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label for="tour_name">Tour name</label>
                          <div class="col-sm-8 col-md-8">
                            
                           <select name="tour_id" id="" class="form-control" onchange="getComboA(this)">
                            <option value="">--Select Tour--</option>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id }}">{{ $tour->tour_name }}</option>
                            @endforeach                           
                            </select>
                          </div>
                            </div>
                        </div>
   <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label for="srs">Price</label>
                          <div class="col-sm-8 col-md-8">
                            <input type="number" class="form-control" name="price"  placeholder="Tour Price">
                          </div>
                            </div>
                        </div>
                      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label for="srs">Seats</label>
                          <div class="col-sm-8 col-md-8">
                            <input type="number" class="form-control" name="seats" min="1" placeholder="no of seats">
                          </div>
                            </div>
                        </div>

                      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label for="srs" class="col-sm-4 col-md-4col-form-label">SRS Price</label>
                          <div class="col-sm-8 col-md-8">
                            <input type="number" class="form-control" name="srs"  placeholder="srs price">
                          </div>
                            </div>
                        </div>

                          <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label for="tour_category" class="col-sm-4 col-md-4 col-form-label">Group Tour Category</label>
                          <div class="col-sm-8 col-md-8">
                            
                            <select name="tour_category" id="" class="form-control" onchange="getComboA(this)">
                              <option value="">--Select tour category--</option>                           
                                <option value="GS">Group Scheduled Tours</option>     
                                <option value="SO">Special Occasions</option>
                                <option value="UN">Utalii Nyumbani</option>                             
                                                     
                            </select>
                          </div>
                            </div>
                        </div>

                    
                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="start_date" class="col-sm-4 col-md-4 col-form-label">Start Date</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="date" class="form-control" name="start_date" >
                            </div>
                              </div>
                          </div>

                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group row">

                 <div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
              </div>
             </div>
            </div>
            </div>

            </form>
          <!-- /.col-->
        </div>
    </section>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Departures List</h3>

        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Tour Name</th>
                    <th>Tour Category</th>                    
                    <th>Price</th>
                    <th>SRS Price</th>
                      <th>Days</th>
                    <th>Start Date</th>
                    <th>End Date</th>     
                    <th>Status</th>                   
                     </tr>
                  </thead>
                  <tbody>
                    

                 @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                    <td><a href="{{ route('sales.show',$data->id) }}"> {{ $data->tour_name }}</a></td>
                     <td>{{ $data->group_tour_category }}</td>
                    <td>{{ $data->price }}</td>
                    <td>{{ $data->srs }}</td>
                    <td>{{ $data->days }}</td>
                    <td>{{ $data->start_date }} </td>
                    <td>{{ $data->end_date }} </td>                  
                    <td>{{ $data->status }} </td>
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
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

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

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
            <h1>Special Offer Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Special Offer Page</li>
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
                  New Special Offer
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('sales.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                    <div class="row">

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Sales Header</label>
                      <div class="col-sm-8 col-md-8">
                        <div class="form-group row">

                              <select name="sales_header" id="" class="form-control">
                                <option value="">Select Sales Header</option>
                                <option>Early Booking Offer</option>
                                <option>Last Minute Offer</option>
                                <option>Holiday Season Sale</option>
                              </select>

                              </div>
                      </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Tour </label>
                          <div class="col-sm-8 col-md-8">
                            <select name="tour_id" id="" class="form-control">
                              <option value="">Select Tour</option>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id }}">{{ $tour->tour_name }}</option>
                            @endforeach
                            </select>
                          </div>
                            </div>
                        </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-4 col-md-4col-form-label">Discount</label>
                          <div class="col-sm-8 col-md-8">
                            <input type="number" class="form-control" name="discount"  placeholder="Discount">
                          </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Deadline</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="date" class="form-control" name="offer_deadline" >
                            </div>
                              </div>
                          </div>

                  <div class="col-md-1 col-lg-1 col-sm-12 col-xs-12 col-md-offset-3">
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
          <h3 class="card-title">Special Offer</h3>

        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Days</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>New Price</th>
                    <th>Sales Header</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                    <td><a href="/editOffer/{{$data->id}}"> {{ $data->tour_name }}</a></td>
                    <td>{{ $data->days }}</td>
                    <td>{{ $data->category }}</td>
                    <td>{{ $data->type }}</td>
                    <td>{{ $data->price }} {{ $data->currency }} </td>
                    <td>{{ $data->discount }} {{ $data->currency }} </td>
                    <td>{{ $data->new_price }} {{ $data->currency }} </td>
                    <td>{{ $data->sales_header }} </td>
                    <td>{{ $data->offer_deadline }} </td>
                    <td>{{ $data->status }} </td>
                    <td><a href="/editOffer/{{$data->id}}"><i class="fa fa-edit"></i></a> 
                    <a href="/offer-Destroy/{{$data->id}}" onclick="return confirm('Are you sure? You want to delete Slider: {{ $data->first_name}} {{ $data->last_name}}','Destroy')"><i class="fa fa-trash red"></i></a></td>

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

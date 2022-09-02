
  @extends('admins.layouts.Apps.app')
  @section('contents')
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
              <form  method="post" id="post_form" action="{{ route('update-offer',$datas->id) }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
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
                                <option value="{{$datas->sales_header}}">{{$datas->sales_header}}/option>
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
                              <option value="{{$datas->tour_id}}">{{$datas->tour_name}}</option>
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
                            <input type="number" class="form-control" name="discount" value="{{ $datas->discount }}">
                          </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Deadline</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="date" class="form-control" name="offer_deadline" value="{{ $datas->offer_deadline }}">
                            </div>
                              </div>
                          </div>

                  <div class="col-md-1 col-lg-1 col-sm-12 col-xs-12 col-md-offset-3">
                      <div class="form-group row">

              <div>
                <button type="submit" class="btn btn-primary float-right">Update</button>
              </div>
             </div>
                </div>

                  <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                    <div class="form-group row">

              <div>
                <a role="button" href="/sales" class="btn btn-success float-right">Return to List</a>
              </div>
             </div>
                </div>
            </div>

            </form>
          <!-- /.col-->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

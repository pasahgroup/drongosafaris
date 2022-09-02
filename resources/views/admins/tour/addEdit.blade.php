
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Cost Summary Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Cost Summary</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class=" container-fluid content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Add Price Cost Per Person in Group Of People
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('updateSummary') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">               
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                 <input type="hidden" name="id" value="{{$tourcostsummaries->id}}">
                <div class="card-body">
                    <div class="row">

                             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Program Name:</label>
                                      <div class="col-sm-8 col-md-8">
                                        <select name="program" id="" class="form-control">
                                          <option value="{{$tourcostsummaries->program}}">{{$tourcostsummaries->program}}</option>
                                          @foreach($programs as $program)
                                          {
                                                <option>{{$program->tour_name}}</option>
                                                }
                                                @endforeach
                                        </select>
                                      </div>
                                  </div>
                             </div>

                     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Season</label>
                              <div class="col-sm-8 col-md-8 ">
                                <select name="season" id="" class="form-control">
                                  <option value="{{$tourcostsummaries->season}}">{{$tourcostsummaries->season}}</option>
                                  <option>Low Season(April & May)</option>
                                  <option>Shoulder Season(March,Nov-14Dec)</option>
                                  <option>High Season(15Dec-Feb,Jun-Oct)</option>
                                </select>
                              </div>
                                </div>
                            </div>
                             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Accommodation Type</label>
                                      <div class="col-sm-8 col-md-8">
                                        <select name="status" class="form-control">
                                          <option value="{{$tourcostsummaries->status}}">{{$tourcostsummaries->status}}</option>
                                          <option>Basic</option>
                                          <option>Comfort</option>
                                          <option>Deluxe</option>
                                        </select>
                                      </div>
                                  </div>
                             </div>
              

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Price: 2PAX</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="number" name="twopax" class="form-control"  value="{{$tourcostsummaries->twopax}}">
                            </div>
                              </div>
                          </div>
                           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Price: 3PAX</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="number" name="threepax" class="form-control"   value="{{$tourcostsummaries->threepax}}">
                            </div>
                              </div>
                          </div>


                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Price: 4PAX</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="number" name="fourpax" class="form-control"  value="{{$tourcostsummaries->fourpax}}">
                            </div>
                              </div>
                          </div>

                           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Price: 5PAX</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="number" name="fivepax" class="form-control"  value="{{$tourcostsummaries->fivepax}}">
                            </div>
                              </div>
                          </div>

                           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Price: 6PAX</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="number" name="sixpax" class="form-control"  value="{{$tourcostsummaries->sixpax}}">
                            </div>
                              </div>
                          </div>
                              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">SRS</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="number" name="srs" class="form-control"  value="{{$tourcostsummaries->srs}}">
                            </div>
                              </div>
                          </div>


                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Currency</label>
                              <div class="col-sm-8 col-md-8 ">
                                <select name="currency" id="" class="form-control">
                                  <option value="{{$tourcostsummaries->currency}}"> {{$tourcostsummaries->currency}}</option>
                                  <option>TSH</option>
                                  <option>USD</option>
                                </select>
                              </div>
                                </div>
                            </div>                         
                        </div>
                    </div>                        



          <div class="form-group row">
          <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
                <a href="/tourcostsummary" role="button" class="btn btn-success float-left">Return To List</a>
                   <button type="submit" class="btn btn-primary float-right">Update</button>
              </div>
                  </div>
                </div>

            </form>
          <!-- /.col-->
        </div>
    </section>
  </div>

@endsection

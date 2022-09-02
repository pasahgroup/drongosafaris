
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Accommodation Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Accommodation</li>
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
                  Add Accommodation
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('accommodations.update',$datas->id) }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                    <div class="row">

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                       <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Accommodation Name</label>
                      <div class="col-sm-8 col-md-8">
                        <input type="text" class="form-control" name="accommodation_name"  value="{{$datas->accommodation_name}}">
                      </div>
                        </div>
                    </div>

                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Price</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="number" name="price" class="form-control"  value="{{$datas->price}}">
                            </div>
                              </div>
                          </div>

                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Currency</label>
                              <div class="col-sm-8 col-md-8 ">
                                <select name="currency" id="" class="form-control">
                                  <option>{{$datas->currency}}</option>
                                <option>TSH</option>
                                  <option>EUR</option>
                                   <option>GBP</option>
                                  <option>USD</option>
                                </select>
                              </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Category</label>
                                  <div class="col-sm-8 col-md-8">
                                    <select name="category" id="" class="form-control">
                                      <option>{{$datas->category}}</option>
                                      <option>Lodge</option>
                                      <option>Camp</option>
                                      <option>Hotel</option>
                                    </select>
                                  </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Type</label>
                                      <div class="col-sm-8 col-md-8">
                                        <select name="type" id="" class="form-control">
                                          <option>{{$datas->type}}</option>
                                          <option>Basic</option>
                                          <option>Comfort</option>
                                          <option>Luxury</option>
                                          <option>Premium</option>
                                        </select>
                                      </div>
                                  </div>
                             </div>

                             <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group row">
                                  <label  class="col-sm-4 col-md-4 col-form-label">Location</label>
                                  <div class="col-sm-8 col-md-8">
                                    <select name="location_id" id="" class="form-control">
                                      <option value="{{$datas->location_id}}">{{$datas->location_name}}</option>
                                     @foreach ($locations as $data)
                                      <option value="{{$data->id}}">{{$data->location_name}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                              </div>
                         </div>
                    </div>
                 
                  
                  <div class="row">
                      <div class="col-md-3 col-sm-12 col-xs-12">
                    <label class="control-label" for="first-name">Accommodation Ranking</label>
                       <select name="national_standard" class="form-control">
                             <option>{{$datas->national_standard}}</option>
                                    <option>0</option>
                                      <option>1</option>
                                        <option>2</option>
                                         <option>3</option>
                                          <option>4</option>
                                           <option>5</option>
                                    </select>
                        
                      </div>

                        <div class="col-md-3 col-sm-12 col-xs-12">
                    <label class="control-label" for="first-name">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$datas->phone}}">
                     </div> 

                      <div class="col-md-3 col-sm-12 col-xs-12">
                    <label class="control-label" for="first-name">Email</label>
                    <input type="text" name="email" class="form-control" value="{{$datas->email}}">
                     </div> 
                   
                    <div class="col-md-3 col-sm-12 col-xs-12">
                    <label class="control-label" for="first-name">Url</label>
                      <input type="text" name="url" class="form-control" value="{{$datas->url}}">
                  </div>
                  </div>


                <div class="col-md-12 col-sm-6 col-xs-12">
                    <label class="control-label">Descriptions </label>
                    <textarea name="accommodation_descriptions" class="form-control"  maxlength="200" class="form-control">{{$datas->accommodation_descriptions}}</textarea>
                </div>

                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <label class="control-label">SEO </label>
                    <textarea name="seo" class="form-control"  maxlength="200" class="form-control">{{$datas->seo}}</textarea>
                </div>
                 <hr>
                <div class="form-group row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                           <label class="control-label" for="first-name">Upload Image</label>
                           <input name="attachment[]" type="file"  multiple>
                    </div>
                </div>
                </div>

                <div class="form-group row">
          <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
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

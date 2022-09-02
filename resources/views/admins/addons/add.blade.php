
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Addon Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Addon</li>
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
                   Add Addon
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('add-ons.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
             <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                    <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Addon Name</label>
                      <div class="col-sm-8 col-md-8">
                        <input type="text" class="form-control" name="addon_name"  placeholder="Addon Name">
                      </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-4 col-form-label">Days</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="days"  placeholder="Days">
                          </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="price" class="col-sm-4 col-md-4 col-form-label">Package Price</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="number" class="form-control"  min="0" name="price" placeholder="Price">
                            </div>
                              </div>
                          </div>

                             <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="srsprice" class="col-sm-4 col-md-4 col-form-label">SRS Price</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="number" class="form-control" min="0" name="srsprice" placeholder="srs price">
                            </div>
                              </div>
                          </div>

                          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-4 col-md-6 col-form-label">Currency</label>
                              <div class="col-sm-8 col-md-6">
                                <select name="currency" id="" class="form-control">
                                  <option value="">Select Currency</option>
                                  <option>TSH</option>
                                  <option>USD</option>
                                </select>
                              </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-md-6 col-form-label">Category</label>
                                  <div class="col-sm-8 col-md-6">
                                    <select name="category" id="" class="form-control">
                                      <option value="">Select Category</option>
                                      <option>Private</option>
                                      <option>Group</option>
                                    </select>
                                  </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-4 col-md-6 col-form-label">Type</label>
                                      <div class="col-sm-8 col-md-6">
                                         <select name="type" id="" class="form-control">
                                          <option value="">--Select Type--</option>
                                          <option>Wildlife Safaris</option>
                                          <option>Hiking & Trekking</option>
                                          <option>Beach Holidays</option>
                                          <option>Combined Tours</option>
                                          <option>Day Tours</option>
                                        </select>
                                      </div>
                                        </div>
                                    </div>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-4 col-md-6 col-form-label">Style</label>
                                      <div class="col-sm-8 col-md-6">
                                        <select name="style" id="" class="form-control">
                                          <option value="">Select style</option>
                                          <option>Basic</option>
                                          <option>Confort</option>
                                          <option>Luxury</option>
                                          <option>Premium</option>
                                        </select>
                                      </div>
                                        </div>
                                    </div>
                    </div>
                  <div class="col-md-12 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Overview
                       </label>
                       <textarea name="overview" class="form-control" maxlength="990"></textarea>

                  </div>
                  <div class="col-md-12 col-sm-6 col-xs-12">
          <label class="control-label" for="first-name">Addon Highlight</label>
          <textarea name="addon_highlight" class="form-control" class="form-control" maxlength="990"></textarea>
                  </div>
       <div class="col-md-12 col-sm-6 col-xs-12">
          <label class="control-label" for="first-name">Pysical Rating</label>
          <select name="physical_rating" id="" class="form-control">
              <option value="">--Select Physical Rating--</option>
              <option>Easy</option>
              <option>Average</option>
              <option>Demanding</option>
              <option>Challenging</option>
          </select>
                  </div>



                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">SEO </label>
                    <textarea name="seo" class="form-control"  maxlength="200" class="form-control"></textarea>
                </div>
                <hr>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Image</label>
                    <input name="attachment[]" type="file" id="main_img" multiple>
             </div>

                </div>

                <div class="form-group row">
          <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
              </div>
                  </div>
                </div>

            </form>
          <!-- /.col-->
        </div>
    </section>
  </div>

@endsection


  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Agent</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Agent</li>
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
                  Add Program
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('programs.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                    <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Tour Name</label>
                      <div class="col-sm-8 col-md-8">
                        <input type="text" class="form-control" name="tour_name"  placeholder="Tour Name">
                      </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-4 col-form-label">Days</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="days"  placeholder="Days" min="1">
                          </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Price</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="number" class="form-control" name="price" placeholder="Price">
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
                                     <option>Private</option>
                                      <option>Group</option>
                                    </select>
                                  </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-4 col-md-6 col-form-label">Service Type</label>
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

                                      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group row">
                                      <label for="tour_circuit" class="col-sm-4 col-md-6 col-form-label">Tour Code</label>
                                      <div class="col-sm-8 col-md-6">
                                        <input type="text" name="tour_code" class="form-control">
                                      </div>
                                        </div>
                                    </div>
                    </div>
                  <div class="col-md-12 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Overview
                       </label>
                       <textarea name="overview"   class="form-control"></textarea>

                  </div>
                  <div class="col-md-12 col-sm-6 col-xs-12">
          <label class="control-label" for="first-name">Tour Highlight</label>
          <textarea name="tour_highlight" class="form-control" class="form-control"></textarea>
                  </div>
                 
    
 <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
          <label class="control-label" for="first-name">Pysical Rating</label>
          <select name="physical_rating" id="" class="form-control">
              <option value="">--Select Physical Rating--</option>
              <option>Easy</option>
              <option>Average</option>
              <option>Demanding</option>
              <option>Challenging</option>
          </select>
          </div>

             <div class="col-md-4 col-sm-6 col-xs-12">
          <label class="control-label" for="first-name">Tour Circuit</label>
           <select name="tour_circuit" id="" class="form-control">
                                          <option value="">Select circuit</option>
                                          <option value="Northern Circuit">Northern Circuit</option>
                                          <option value="Southern Circuit">Southern Circuit</option>
                                          <option value="Eastern Circuit">Eastern Circuit</option>
                                            <option value="Western Circuit">Western Circuit</option>
                                        </select>
          </div>
     <div class="col-md-4 col-sm-6 col-xs-12">
          <label class="control-label" for="popular_experience">Popular Experience</label>
          <select name="popular_experience" class="form-control">
            <option>No</option>
              <option>Yes</option>              
          </select>
          </div>
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

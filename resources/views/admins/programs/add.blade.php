
  @extends('admins.layouts.Apps.app')
  @section('contents')
<link href="../../img_library/main.css" rel="stylesheet">
    <link href="../../img_library/mform.css" rel="stylesheet">
 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Program Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Programs</li>
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
                      <label class="control-label" for="first-name">Tour Name
                       </label>
                      <input type="text" class="form-control" name="tour_name"  placeholder="Tour Name">
                      </div>
                 
                    <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Days
                       </label>
                      <input type="number" class="form-control" name="days"  placeholder="Day" min="1">
                      </div>

          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Tour Cost
                       </label>
                        <input type="number" class="form-control" name="cost" placeholder="Cost">
                      </div>

                       <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Tour Price
                       </label>
                       <input type="number" class="form-control" name="price" placeholder="Price" min="0">
                      </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Currency
                       </label>
                        <select name="currency" id="" class="form-control">
                                  <option value="">Select Currency</option>
                                  <option>TSH</option>
                                  <option>EUR</option>
                                  <option>GBP</option>
                                  <option>USD</option>
                        </select>
                      </div>
                    </div>

                    <div class="row">

                     <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Category
                       </label>
                          <select name="category" id="" class="form-control">
                                     <option>Private</option>
                                      <option>Group</option>
                                    </select>
                      </div>
                                       
                           <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Service Type
                       </label>
                        <select name="type" id="" class="form-control">
                                          <option value="">--Select Type--</option>
                                          <option>Wildlife Safaris</option>
                                          <option>Hiking & Trekking</option>
                                          <option>Beach Holidays</option>
                                          <option>Combined Tours</option>
                                          <option>Day Tours</option>
                                           <option>Historical Site</option>
                                            <option>Cultural Tour</option>
                                        </select>
                      </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Style
                       </label>
                           <select name="style" id="" class="form-control">
                                          <option value="">Select style</option>
                                          <option>Basic</option>
                                          <option>Confort</option>
                                          <option>Luxury</option>
                                          <option>Premium</option>
                                        </select>
                      </div>
                         <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Main
                       </label>
                           <select name="main" id="" class="form-control">
                                          <option value="">Select level</option>
                                          <option>Program</option>
                                          <option>Addon</option>
                                        </select>
                      </div>
                    </div>


                  <div class="col-md-12 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Overview
                       </label>
                       <textarea name="overview" class="form-control" maxlength="990"></textarea>

                  </div>
                  <div class="col-md-12 col-sm-6 col-xs-12">
          <label class="control-label" for="first-name">Tour Highlight</label>
          <textarea name="tour_highlight" class="form-control" class="form-control" maxlength="990"></textarea>
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
                                              <option value="Central Circuit">Central Circuit</option>
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
                 <div class="row">
                 <div class="col-lg-6 col-md-12 col-sm-12">
                                    <x-label for="password_confirmation" :value="__('Image')" />
                                    <div class="form-group">
                                    <input type="file" name="attachment[]" onChange="displayImage(this)" id="attachment" accept="image/*" class="" style="display:block;"> 
                                   
                                </div>
                                </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">               
              </div>
              <img src="images/no.png" onClick="triggerClick()" id="profileDisplay">
            </span>
            </div>
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
<script src="../../img_library/scripts.js" type="text/javascript"></script>
@endsection

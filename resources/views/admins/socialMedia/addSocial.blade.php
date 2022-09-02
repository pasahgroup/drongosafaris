
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('socialMedia.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Add New Social Name</li>
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
                  Add Social name
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('socialMedia.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <!-- <input type="hidden" name="user_id" value="{{ Auth::id() }}"> -->
                <div class="card-body">
                    <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-md-4 col-form-label">Social name:</label>
                            <div class="col-sm-8 col-md-8">
                              <input type="text" name="social_name" class="form-control"  placeholder="social name">
                            </div>
                              </div>
                          </div>                                                 
                        </div>
                    </div>                        

          <div class="form-group row">
          <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
                <a href="/socialMedia" class="btn btn-success float-left">Return to List</a>
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

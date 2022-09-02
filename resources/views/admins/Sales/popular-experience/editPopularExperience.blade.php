
  @extends('admins.layouts.Apps.app')
  @section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Popular Experience Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Popular ExperiencePage</li>
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
                  New Popular Experience
                </h3>
              </div>
              <div class="container-fluid x_content">
              
           <form  method="post" id="post_form" action="/updatePopularExperience/{{$datas->id}}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                    <div class="row">
                   
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label for="tour_name" class="col-form-label">Tour name:</label>
                        
                            <input type="text" name="tour_id" value="{{ $datas->id }}" readonly="true">
                          </div>
                        </div>
           
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       
                            <label for="srs">Description:</label>
                                 <textarea name="descriptions" id="" cols="40" rows="2">{{ $datas->descriptions }}</textarea>

                        </div>

                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                 <div class="form-group row">                 
                <button type="submit" class="btn btn-primary float-right">Save</button>
           
             </div>
            </div>
            </div>

            </form>
        </div>
    </section>
 </div>
  <!-- /.content-wrapper -->
@endsection

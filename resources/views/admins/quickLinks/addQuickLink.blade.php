
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Page</li>
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
                  Add Page
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('quickLink.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                    <div class="row">

                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group row">                    
                        <label>Page Type</lable>
                        <select name="page_type" class="form-control">
                        <option value="Yes">-- Select page type--</option>
                          @foreach($pageTypes as $type)
                          <option value="{{$type->category}}">{{$type->category}}</option>
                          @endforeach
                         </select>
                        
                        </div>
                     </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group row">                    
                        <label>Page Title</lable>
                        <input type="text" class="form-control" name="quick_title"  placeholder="Quick-link Title">
                  
                      </div>
                     </div>
                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group row">                    
                        <label>Slider</lable>
                        <select name="slider" class="form-control">
                        <option value="Yes">-- Select Option--</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                         </select>
                        
                        </div>
                     </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group row">                    
                        <label>Page-link Url</lable>
                        <input type="text" class="form-control" name="url"  placeholder="Url">                  
                     </div>
                   </div>
                   <dv>
                  </div>

                  <div class="col-md-12 col-sm-6 col-xs-12">
                      <label class="control-label" for="quick_description">Message Body/Description
                       </label>
                       <textarea name="quick_description" class="form-control" maxlength="990"></textarea>

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
                 <a href="{{route('quickLink.index')}}" class="btn btn-success float-left">Page List</a>
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

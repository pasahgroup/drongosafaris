
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
                
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('page.store') }}">
                @csrf

                <div class="card-body">
                       
                    <label>Widget Name</label>
                    <input class="form-control" type="text" name="widget_name" value="{{$widgets->widget_descriptions}}">
                    
                    <label>Widget Descriptions</label>
                    <textarea class=" form-control  " name="widget_descriptions" placeholder="Widget descriptions " cols="10" rows="5">{{$widgets->widget_descriptions}}</textarea>
             </div>               
             <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
                <a href="/widgetList"  role="button" class="btn btn-success float-left">View Widget List</a>
              <button type="submit" class="btn btn-primary float-right" name="widget" value="widget">Update</button>         
              </div>
             </div>
            </form>
               <br>
        </div>
    </section>
  </div> 

@endsection

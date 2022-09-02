
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Widget List for ---</h2>
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
           
              <div class="container-fluid x_content">
                <br />
              <form  method="post" href="pageWidgetList/12" action="#" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
        
      @foreach ($widgets as $widget)
                      <button type="submit" class="btn btn-secondary text-left" style="margin-bottom:2px; min-width: 400px;" name="widget_id" value="{{$widget->id}}">
          {{$widget->widget_name}}     <span class="fa fa-angle-right float-right"></span></button>
              @endforeach                      
                
            
      <hr>
       <div class="form-group row">
              <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
              <button type="submit" class="btn btn-primary float-right" name="page" value="save page">Next</button>         
              </div>
                  </div>
                </div>
                 </div>               
            </form>
      
            
        </div>
    </section>
  </div> 

@endsection

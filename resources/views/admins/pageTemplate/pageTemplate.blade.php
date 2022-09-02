
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Create New Page</h2>
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
              <form  method="post" id="post_form" action="/pageWidgetList/12" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                  <div>
                    <label>Create New Page</label>
                      <select name="page_id" id="" class="form-control">
                              <option value="">--Select Page Title--</option>
                            @foreach ($pages as $page)
                             <option value="{{ $page->id }}">{{ $page->page_title }}</option>
                            @endforeach                           
                            </select>

                  </div>
            
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

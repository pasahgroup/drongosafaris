
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Posts Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Post</li>
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
                  Add Post
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('PostBody.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                         <div class="form-group">                                 
                                  <div class="col-sm-5 col-md-5">
                                     <div class="col-sm-8 col-md-8"><label for="post_category" class="">Category </label>
                        <input type="text" class="form-control" name="post_category" value="{{$aboutUsBody->category}}" readonly="true">
                      </div>
                                  </div>
                                  </div>
                             
      <!-- Data for About us information -->
              <div name="aboutus-panel" id="aboutus-panel">
               <div class="row">                 
                 <div class="col-lg-12">
                    <div class="form-group row">   
                     <div class="col-sm-12"><label for="post_category" class="">Introduction </label>
                        <textarea name="introduction"   class="form-control" >{{$aboutUsBody->introduction}}</textarea>
                      </div>                 
                       </div>
                    </div>
                      
                   <div class="col-lg-12">
                    <div class="form-group row">   
                     <div class="col-sm-12"><label for="post_category" class="">Mission </label>
                        <textarea name="mission" id="dd" class="form-control">{{$aboutUsBody->mission}}</textarea>
                      </div>                 
                       </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group row">   
                     <div class="col-sm-12"><label for="post_category" class="">Vission </label>
                        <textarea name="vission" class="form-control">{{$aboutUsBody->vission}}</textarea>
                      </div>                 
                       </div>
                    </div>
 
                   <div class="col-lg-12">
                    <div class="form-group row">   
                     <div class="col-sm-12"><label for="post_category" class="">Objectives</label>
                        <textarea name="objectives" class="form-control">{{$aboutUsBody->objectives}}</textarea>
                      </div>                 
                       </div>
                    </div>
                 
                  </div>
               </div>
            <!--End Data for About us information -->
             </div>               
      
             <div class="form-group row">
              <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
              <button type="submit" class="btn btn-primary float-right">Update</button>         
              </div>
                  </div>
                </div>
            </form>
        </div>
    </section>
  </div> 
@endsection

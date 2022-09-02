
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>What We Offer Page</h1>
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
                 Add/Update What We Offer information
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('Service.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                          <div class="form-group">  
                                 <label for="post_category" class="">Post Category </label>                                
                                  <div class="col-sm-5 col-md-5">
                                    <input type="text" class="form-control" name="post_category" value="What We Offer" readonly="true">
                                  </div>
                                  </div>
                             

                                                
                <div class="row" id="title">          
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">                      
                      <div class="col-sm-8 col-md-8"><label for="title" class="">Message title </label>
                        <input type="text" class="form-control" name="title"  placeholder="title">
                      </div>
                        </div>
                    </div>
                 </div>

                  <div name="normal-panel" id="normal-panel">
                  <div class="col-md-12 col-sm-6 col-xs-12">
                      <label class="control-label" for="post_body">Message Body/Description
                       </label>
                      <textarea name="post_body" class="form-control" maxlength="300"></textarea>

                  </div>
     
                <hr>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Image</label>
                    <input name="attachment[]" type="file" id="main_img" multiple>
                 </div>
               </div>

      <!-- Data for About us information -->               
      
             <div class="form-group row">
              <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
              <button type="submit" class="btn btn-primary float-right">Save</button>         
              </div>
                  </div>
                </div>
            </form>
        </div>
    </section>
  </div> 



<!-- <style type="text/css">
  #test{ display:none; }
</style> -->
<script type="text/javascript">  
    let title = document.getElementById('title');
    //letcc=title.style.display = 'none';
    //letcc2=title.style.display = 'show';

      function showHide() {
        let doc = document.getElementById('post_category')
        if (doc.value == "Contact") {
            document.getElementById('contact-panel').style.display = 'block'
            document.getElementById('normal-panel').style.display = 'none'
            document.getElementById('aboutus-panel').style.display = 'none'
            letcc;
          title.style.display = 'none'; //or
          //title.style.visibility = 'hidden';
          } 

         else if(doc.value =="About us"){
            document.getElementById('contact-panel').style.display = 'none'
             document.getElementById('normal-panel').style.display = 'none'
            document.getElementById('aboutus-panel').style.display = 'block'
              title.style.display = 'show';
                     }

           else if(doc.value =="Welcome message"){
            document.getElementById('contact-panel').style.display = 'none'
             document.getElementById('normal-panel').style.display = 'block'
                document.getElementById('aboutus-panel').style.display = 'none'
            }
        else
        {
         document.getElementById('contact-panel').style.display = 'none'
         document.getElementById('aboutus-panel').style.display = 'none'
         document.getElementById('normal-panel').style.display = 'block'
        }
    }
</script>

<script>
$(document).on('ready', function () {

    $('.dd').hidden();

});
<script>

@endsection

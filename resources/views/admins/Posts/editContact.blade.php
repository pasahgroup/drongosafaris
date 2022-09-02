
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
                        <input type="text" class="form-control" name="post_category" value="{{$contactsBody->category}}" readonly="true">
                      </div>
                                  </div>
                                  </div>
                             

                   <div name="title-panel" id="title-panel">                          
                 <div class="row" id="title">          
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">                      
                      <div class="col-sm-8 col-md-8"><label for="post_category" class="">Title </label>
                        <input type="text" class="form-control" name="title"  value="{{$contactsBody->title}}">
                      </div>
                        </div>
                    </div>
                  </div>
                </div>


            <!--End Data for About us information -->

             <!-- Data for contact information -->
          <div name="contact-panel" id="contact-panel">
               <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group row">                      
                      <div class="col-sm-8 col-md-8"><label for="post_category" class="">Address </label>
                        <input type="text" class="form-control" name="address"  value="{{$contactsBody->address}}">
                      </div>
                        </div>
                    </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group row">
                      
                      <div class="col-sm-8 col-md-8"><label for="post_category" class="">Phone </label>
                        <input type="text" class="form-control" name="phone" value="{{$contactsBody->phone}}">
                      </div>
                        </div>
                    </div>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group row">                      
                      <div class="col-sm-8 col-md-8"><label for="post_category" class="">Email </label>
                        <input type="email" class="form-control" name="email"  value="{{$contactsBody->email}}">
                      </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group row">
                      
                      <div class="col-sm-8 col-md-8"><label for="post_category" class="">Website </label>
                        <input type="text" class="form-control" name="website"  value="{{$contactsBody->website}}">
                      </div>
                        </div>
                    </div>
                  </div>
           </div>
          <!-- End Data for contact information -->
             </div>               
      
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
             document.getElementById('title-panel').style.display = 'none'
            letcc;
          title.style.display = 'none'; //or
          //title.style.visibility = 'hidden';
          } 

         else if(doc.value =="About us"){
            document.getElementById('contact-panel').style.display = 'none'
             document.getElementById('normal-panel').style.display = 'none'
            document.getElementById('aboutus-panel').style.display = 'block'
              document.getElementById('title-panel').style.display = 'none'
              title.style.display = 'show';
                     }

           else if(doc.value =="Welcome message"){
            document.getElementById('contact-panel').style.display = 'none'
             document.getElementById('normal-panel').style.display = 'block'
                document.getElementById('aboutus-panel').style.display = 'none'
                  document.getElementById('title-panel').style.display = 'block'
            }
        else
        {
         document.getElementById('contact-panel').style.display = 'none'
         document.getElementById('aboutus-panel').style.display = 'none'
         document.getElementById('normal-panel').style.display = 'block'
           document.getElementById('title-panel').style.display = 'block'
        }
    }
</script>

<script>
$(document).on('ready', function () {

    $('.dd').hidden();

});
</script>

@endsection

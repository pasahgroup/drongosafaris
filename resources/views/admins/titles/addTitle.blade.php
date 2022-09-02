
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Titles,Static Images and Mesages</h1>
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
               Lists of Titles,Static Images and Mesages page
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('titles.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                                                                     
                <div class="row" id="title">          
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">                      
                      <div class="col-sm-8 col-md-8"><label for="title" class="">Message Title</label>
                         <select name="title" id="" class="form-control">
                                          <option value="">--Select Title--</option>
                                            <option>About us</option>
                                            <option>Wildlife Safaris</option>
                                              <option>Hiking & Trekking</option>
                                                <option>Beach Holidays</option>
                                              <option>Combined Tours</option>
                                                  <option>Day Tours</option>

                                                  <option>Scheduled Group Tours</option>
                                                    <option>Special Occasions</option>
                                                      <option>Special Offers</option>
                                                        <option>Utalii Nyumbani</option>
                                                          <option value="Cultural Tours">Cultural Tours</option> 
                                                            <option value="Addons">Addons</option> 
                                                          <option>What We Offer</option>
                                                    <option>Uniqueness</option>
                                             <option>Popular Experience</option>
                                               <option value="Northern Circuit">Northern Circuit</option>
                                          <option value="Southern Circuit">Southern Circuit</option>
                                          <option value="Eastern Circuit">Eastern Circuit</option>
                                            <option value="Western Circuit">Western Circuit</option>
                                            
                                         
                         </select>
                      </div>
                        </div>
                    </div>
                    </div>

                  <div name="normal-panel" id="normal-panel">
                  <div class="col-md-12 col-sm-6 col-xs-12">
                      <label class="control-label" for="post_body">Message Body/Description
                       </label>
                       <textarea name="post_body" class="form-control" maxlength="1000"></textarea>

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

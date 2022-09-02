
  @extends('admins.layouts.Apps.app')
  @section('contents')
   <style type="text/css">
    .red{
      color: red;
    }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Testimonies Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Testimonies Page</li>
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
                  Add New Testimony
                </h3>
              </div>
              <div class="container-fluid x_content">
                <br />
              <form  method="post" id="post_form" action="{{ route('Testimonies.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
               
                    <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group row">
                      <label for="full_name" class="col-sm-4 col-md-4 col-form-label">Full Name</label>
                      <div class="col-sm-8 col-md-8">
                        <input type="text" class="form-control" name="full_name"   placeholder="full name" value="">
                      </div>
                        </div>
                    </div>

                      
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group row">
                                  <label for="rank" class="col-sm-4 col-md-4 col-form-label">Rate us(1-5)</label>
                                  <div class="col-sm-8 col-md-8">
                                    <select name="rank" id="" class="form-control">
                                      <option value="">Select Category</option>
                                      <option value="1">1</option>
                                        <option value="2">2</option>
                                       <option value="3">3</option>
                                         <option value="4">4</option>
                                           <option value="5">5</option>
                                    </select>
                                  </div>
                                    </div>
                                </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group row">
                      <label for="status" class="col-sm-4 col-md-4 col-form-label">Status</label>
                      <div class="col-sm-8 col-md-8">
                        <select name="status" id="" class="form-control">
                                   
                                      <option value="0">0</option>
                                        <option value="1">1</option>
                                    </select>
                      </div>
                    </div>
                    </div>
                  <div class="col-md-12 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Comments
                       </label>
                       <textarea name="comments"  class="form-control" max="180"></textarea>
                  </div>
                <br>
                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="form-group row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                           <label class="control-label" for="first-name">Upload your Photo</label>
                           <input name="attachment[]" type="file"  multiple required="">
                           <input type="hidden" class="form-control" name="client" value="Admin">
                    </div>
                  
                </div>
              </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="form-group row">                   
                    <div class="col-md-6 col-sm-12">             
                   <a href="/Testimonies" role="button" class="btn btn-success float-left">Return to List</a>
                       </div>
                     </div>
                   </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group row">
                    <div class="col-md-6 col-sm-12">             
                   <button type="submit" class="btn btn-primary float-right">Submit</button>
              </div>
              </div>
            </div>
                </div>              
              </form> 
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
@endsection

<script type="text/javascript">
  
  function getComboA(selectObject) {
  var value = selectObject.value;  
  console.log(value);
}
</script>
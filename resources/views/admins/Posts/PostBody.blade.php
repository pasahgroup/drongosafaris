
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
              <li class="breadcrumb-item active">Posts Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Post body</h3>

          <div class="card-tools">
          <a href="{{ route('PostBody.create') }}" class="btn btn-primary" >
              <i class="fas fa-plus"></i> New post
            </a>
          </div>
             <div class="card-tools">
              <br>
             </div>
           <div class="card-tools">
           <div class="col-sm-8 col-md-8">
                                    <select name="post_category" id="post_category" class="form-control" onChange=showHide()>
                                      <option value="0">--Select Post Category--</option>
                                        @foreach($Postcategory as $data)
                                      <option value="{{$data->category}}">{{$data->category}}</option>    @endforeach                                 
                                    </select>
                                  </div>

          </div>
        </div>
        <div class="card-body">
            <div class="card-body">

    <!-- panel Other -->
    <hr>
      <div class="row">
<span><b style="background-color: red;">Contact Panel</b></span>
</div>
      <div name="contact-panel" id="contact-panel">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>#</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Address</th>
                    <th>Phone No.</th>  
                    <th>Email</th>                 
                    <th>Website</th>
                    <th>Action</th>  
                  </tr>

                  </thead>
                  <tbody>
                   
                      @foreach ($contacts as $data)
                            <tr>
                    <td>{{ $data->id }}</td>
                      <td><a href="/editContact">{{ $data->category }}</a></td>
                     <td><a href="/editContact">{{ $data->title }}</a></td>
                    <td>{{ $data->address }}</td>
                      <td>{{ $data->phone }}</td>
                    <td>{{ $data->email }}</td>
                      <td>{{ $data->website }}</td>
                         <td><a href="/editContact"><i class="fa fa-edit"></i></a> <a href="#"><i class="fa fa-trash"></i></a></td>
                                </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>                  
                    <th>#</th>
                       <th>Category</th>
                    <th>Title</th>
                    <th>Address</th>
                    <th>Phone No.</th>  
                    <th>Email</th>                 
                     <th>Website</th> 
                     <th>Action</th>  
                  </tr>
                  </tfoot>
                </table>
</div>
<hr>
  <div class="row">
<span><b style="background-color: green;">About us Panel</b></span>
</div>
  <!-- panel aboutus -->
      <div name="aboutus-panel" id="aboutus-panel">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                     <th>Category</th>
                    <th>Introduction</th>
                    <th>Mission</th>
                    <th>Vission</th>  
                    <th>Objectives</th>                
                       <th>Action</th>
                      
                  </tr>
                  </thead>
                  <tbody>
                   
                      @foreach ($aboutUs as $data)
                            <tr>
                    <td><a href="/editAboutus">{{ $data->id }}</td>
                     <td><a href="/editAboutus">{{ $data->category }}</td>
                     <td>{{ $data->introduction}}</a></td>
                    <td>{{ $data->mission }}</td>
                      <td>{{ $data->vission }}</td>
                    <td>{{ $data->objectives }}</td>
                   
                         <td><a href="/editAboutus"><i class="fa fa-edit"></i></a> <a href="#"><i class="fa fa-trash"></i></a></td>
                                </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>                  
                    <th>#</th>
                     <th>Category</th>
                    <th>Introduction</th>
                    <th>Mission</th>
                    <th>Vission</th>  
                    <th>Objectives</th>                
                    <th>Action</th>  
                  </tr>
                  </tfoot>
                </table>
</div>
<!-- End of Panel aboutus -->
     <div name="other-panel" id="other-panel">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>                   
                    <th>Category</th>
                     <th>Title</th>
                    <th>Body</th> 
                    <th>Action</th>                 
                  </tr>
                  </thead>
                  <tbody>
                   
                      @foreach ($others as $data3)
                            <tr>
                    <td><a href="/editOthers">{{ $data3->id }}</a></td>
                     <td><a href="/editOthers">{{ $data3->category}}</a></td>
                    <td>{{ $data3->title }}</td>
                    <td>{{ $data3->body }}</td>
                     <td><a href="/editOthers/{{$data3->id}}"><i class="fa fa-edit"></i></a> <a href="#"><i class="fa fa-trash"></i></a></td>
                              </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                   <th>#</th>
                     <th>Category</th>
                    <th>Title</th>                  
                    <th>Body</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
  </div>
  </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
     </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">  
    let title = document.getElementById('title');
    //letcc=title.style.display = 'none';
    //letcc2=title.style.display = 'show';

      function showHide() {
        let doc = document.getElementById('post_category')

        if (doc.value == "Contact") {

            document.getElementById('contact-panel').style.display = 'block'

           document.getElementById('aboutus-panel').style.display = 'none'
           document.getElementById('other-panel').style.display = 'none'
                       } 

          else if(doc.value =="About us"){
          document.getElementById('contact-panel').style.display = 'none'

           document.getElementById('aboutus-panel').style.display = 'block'
           document.getElementById('other-panel').style.display = 'none'
                  }

        else
        {
         document.getElementById('other-panel').style.display = 'block'
         document.getElementById('contact-panel').style.display = 'none'
         document.getElementById('aboutus-panel').style.display = 'none'
        }
    }
</script>
@endsection

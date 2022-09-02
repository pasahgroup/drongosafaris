
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
            <h1>Contact Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact Page</li>
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
          <h3 class="card-title">Contacts</h3>

          <div class="card-tools">
          <a href="{{ route('PostBody.create') }}" class="btn btn-primary" >
              <i class="fas fa-plus"></i> New Contact
            </a>
          </div>
             <div class="card-tools">
              <br>
             </div>
           <div class="card-tools">
                   </div>
        </div>
        <div class="card-body">
            <div class="card-body">

    <!-- panel Other -->
  
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
                     <td>{{ $data->title }}</td>
                    <td>{{ $data->address }}</td>
                      <td>{{ $data->phone }}</td>
                    <td>{{ $data->email }}</td>
                      <td>{{ $data->website }}</td>
                         <td><a href="/editContact"><i class="fa fa-edit"></i></a> 
                         <a href="/destroy-contact/{{$data->id}}" onclick="return confirm('Are you sure? You want to delete: {{ $data->category}}','Destroy')"><i class="fa fa-trash red"></i></a></td>
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


        </div>
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

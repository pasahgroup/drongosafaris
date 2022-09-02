
  @extends('admins.layouts.Apps.app')
  @section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Programs Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Programs Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Phone</th>
                    <th>Email</th>
                     <th>Status</th>
                     <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($contacts as $contact)
                    <tr>
                    <td>{{ $contact->id }}</td>               
                    <td>{{ $contact->full_name }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->comment }}</td>  
                    <td>{{ $contact->phone }}</td>       
                    <td>{{ $contact->email }}</td>

                    <td>
  
 <select class="status" name="status" id="status" class="form-control">
 <option value="{{$contact->id}}">Active</option> 
<option value="{{$contact->id}}">Inactive</option> 

@if($contact->status =='Active')  
<option value="{{$contact->id}}">Active</option>         
@else
     <option value="{{$contact->id}}">Inactive</option> 
@endif
 </select>  
 </td>
                   
                    <td>{{ $contact->created_at }}</td>              
                  </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                   <th>#</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                  </tfoot>
                </table>
              </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>


  <script type="text/javascript"> 
    //  function getURL(){
    //     url2=window.location.href;
    //       alert(url2);
    // }
 
    var APP_URL = {!! json_encode(url('/')) !!}
       // var base_url = '{{ URL::asset('/') }}';
          // var base_url = '{{ URL('/') }}';
         //url=window.location.href;

      //alert(res[0]);
    $(".status").change(function(){
      // var APP_URL = '{{ URL::asset('/') }}';
       url=window.location.href;
       pathname=window.location.pathname;
      // url3=window.location.protocol;
       //host=window.location.host;
        search=window.location.search;
       // loc=window.location;
         //alert(url);
      
 
if(search.length ===0)
{
  window.location.href =url + "/"+ $(this).val();
}
else
{
  var res = url.match("http(.*)");
  window.location.href =res[0] + "/"+ $(this).val();
}
  });
</script>
@endsection
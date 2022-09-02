
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
            <h1>Tailor Made Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tailor Made Page</li>
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
                    <th>First name</th>
                     <th>Last name</th>
                     <th>Status</th>
                    <th>Nationality</th>

                   <th>Min Budget</th>
                    <th>Max Budget</th>
                    <th>Calculated Cost</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Teens</th>

                    <th>Days</th>
                    <th>Tour Type</th>
                   
                    <th>Destination</th>
                     <th>Accommodation</th>  
                        <th>Email</th>  
                         <th>Phone</th>               
                    <th>Extra Info.</th>
                    <th>Arrival Date</th>
                    <th>End Date</th>
                    <th>PIN Contorl</th>
                    <th>Status</th>
                    <th>Hear_about_us</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($datas as $data)
                    <tr>
                    <td>{{ $data->id }}</td>
                    <td><a href="/editTailor/{{$data->id}}">{{ $data->first_name }}</a></td>
                     <td>{{ $data->last_name }}</td>

                                        <td>
  
 <select class="status" name="status" id="status" class="form-control">

<option value="{{$data->id}}">Active</option> 
<option value="{{$data->id}}">Inactive</option> 

@if($data->status =='Active')  
<option value="{{$data->id}}">Active</option>         
@else
     <option value="{{$data->id}}">Inactive</option> 
@endif

 </select>  
 </td>
                    <td>{{ $data->nationality }}</td>

                      <td>{{ $data->min_budget }} {{ $data->currency }}</td>
                     <td>{{ $data->max_budget }} {{ $data->currency }}</td>
                      <td>{{ $data->calculated_cost }} {{ $data->currency }}</td>

                   <td>{{ $data->adults }}</td>
                    <td>{{ $data->children }}</td>
                    <td>{{ $data->teens }}</td>
                     <td><a href="/attachmentTailorMade/{{$data->id}}">{{ $data->days }}</a></td>
                     <td>{{ $data->tour_type }}</td>
                   

                     <td>{{ $data->destination }}</td>
                    <td>{{ $data->accommodation }}</td>
                     
                      <td>{{ $data->phone }}</td>
                       <td>{{ $data->email }}</td>

                    <td>{{ $data->additional_information }}</td>
                    <td>{{ $data->arrival_date }}</td>
                    <td>{{ $data->end_date }}</td>
                    <td>{{ $data->pin }}</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->hear_about_us }}</td>
                    <td><a href="{{ route('editTailor',$data->id) }}"><i class="fa fa-edit"></i></a> 
                      <a href="/tailorDestroy/{{$data->id}} " onclick="return confirm('Are you sure? You want to delete {{ $data->first_name}} {{ $data->first_name}} Program','Tailor made')"><i class="fa fa-trash red"></i></a></td>
                  </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                      <th>#</th>
                     <th>First name</th>
                     <th>Last name</th>
                      <th>Status</th>

                    <th>Nationality</th>
                    <th>Min Budget</th>
                    <th>Max Budget</th>
                    <th>Calculated Cost</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Teens</th>

                    <th>Days</th>
                    <th>Tour Type</th>
                    
                    <th>Destination</th>
                     <th>Accommodation</th>                  
                        <th>Email</th>  
                         <th>Phone</th> 

                    <th>Extra Info.</th>
                    <th>Arrival Date</th>
                    <th>End Date</th>
                     <th>PIN Contorl</th>
                    <th>Status</th>
                    <th>Hear_about_us</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>

        </div>
        <!-- /.card-body -->
        <div class="footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript"> 

    var APP_URL = {!! json_encode(url('/')) !!}
       // var base_url = '{{ URL::asset('/') }}';
          // var base_url = '{{ URL('/') }}';
         //url=window.location.href;

      //alert(res[0]);
    $(".status").change(function(){
       v=$(this).val();
       let url2 = "{{ route('tailorMade-status',':id') }}";
        url2 = url2.replace(':id', v);
      
      // var APP_URL = '{{ URL::asset('/') }}';
       url=window.location.href;
       //pathname=window.location.pathname;
      // url3=window.location.protocol;
       host=window.location.host;
        search=window.location.search;
    
if(search.length ===0)
{
  window.location.href =url2;

}
else
{
  // var res = url2.match("http(.*)");
  // window.location.href =res[0] + "/"+ $(this).val();
  alert("Ops not Okey");
}
  });
</script>
@endsection


  @extends('admins.layouts.Apps.app')
  @section('contents')

  <style type="text/css">    
    .red {
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
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tour Cost Summanry Page</li>
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
          <h3 class="card-title"><b>Tour: Summanry Cost</b></h3>

          <div class="card-tools">
            <a href="{{ route('tourcostsummary.create') }}" class="btn btn-primary" >
              <i class="fas fa-plus"></i> Add Cost
            </a>
          </div>
        </div>
        <div class="card-body">
            <div class="card-body">
        <table class="table table-bordered data-table"> 
        <colspan>
           <col width="10%">
          <col width="20%">
          <col width="10%">
        </colspan>
        <tr>
          <th class="title" colspan="8" style="background-color:limegreen;">BASIC LEVEL ACCOMODATIONS</th>
        </tr>
        <tr>         
           <th class="title" colspan="2"></th>           
          <th class="title" colspan="7">PRICE PER PERSON IN USD</th>
        </tr>
        <tr>
        <th>#</th>       
          <th>Season</th>  
          <th>Tour name</th>         
          <th>2PAX</th>
           <th>3PAX</th>
            <th>4PAX</th>
             <th>5PAX</th>
              <th>6PAX</th>
              <th>SRS</th>
              <th>Action</th>
        </tr>

 @foreach ($basic as $datab)
          <tr>
                    <td>{{ $datab->id }}</td>
                    <td><a href="{{ route('tourcostsummary.show',$datab->id) }}"> {{ $datab->season}}</a></td>       
                    <td>{{ $datab->program }}</td>              
                    <td>{{ $datab->twopax }}</td>
                    <td>{{ $datab->threepax }}</td>
                    <td>{{ $datab->fourpax }}</td>
                    <td>{{ $datab->fivepax }}</td>
                    <td>{{ $datab->sixpax }}</td>
                    <td>{{ $datab->srs }}</td>
                      
                      <td><a href="{{ route('editTourSummary',$datab->id) }}"><i class="fa fa-edit"></i></a>
                     <a href="{{ route('deleteSummary',$datab->id) }}" onclick="return confirm('Are you sure? You want to delete {{ $datab->program}}','Inclusive')"><i class="fa fa-trash red"></i></a></td>
                  </tr>
                   @endforeach
         </table>

<hr>
<table class="table table-bordered data-table"> 
        <colspan>
           <col width="10%">
          <col width="20%">
          <col width="10%">
        </colspan>
        <tr>
          <th class="title" colspan="8" style="background-color:burlywood;">COMFORT LEVEL ACCOMODATIONS</th>
        </tr>
        <tr>         
           <th class="title" colspan="2"></th>           
          <th class="title" colspan="6">PRICE PER PERSON IN USD</th>
        </tr>
        <tr>
         <th>#</th>       
          <th>Season</th>
          <th>Tour name</th>
          <th>2PAX</th>
           <th>3PAX</th>
            <th>4PAX</th>
             <th>5PAX</th>
              <th>6PAX</th>
              <th>SRS</th>
        </tr>

 @foreach ($comfort as $datac)
          <tr>
                  <td>{{ $datac->id }}</td>
                    <td><a href="{{ route('tourcostsummary.show',$datac->id) }}"> {{ $datac->season}}</a></td>      
                    <td>{{ $datac->program }}</td>           
                    <td>{{ $datac->twopax }}</td>
                    <td>{{ $datac->threepax }}</td>
                    <td>{{ $datac->fourpax }}</td>
                    <td>{{ $datac->fivepax }}</td>
                    <td>{{ $datac->sixpax }}</td>
                    <td>{{ $datac->srs }}</td>
                  </tr>
                   @endforeach
         </table>
         <hr>
         <table class="table table-bordered data-table"> 
        <colspan>
           <col width="10%">
          <col width="20%">
          <col width="10%">
        </colspan>
        <tr>
          <th class="title" colspan="9" style="background-color:violet;">DELUXE LEVEL ACCOMODATIONS</th>
        </tr>
        <tr>         
           <th class="title" colspan="2"></th>           
          <th class="title" colspan="6">PRICE PER PERSON IN USD</th>
        </tr>
        <tr>
             <th>#</th>       
          <th>Season</th>  
          <th>Tour name</th>        
          <th>2PAX</th>
           <th>3PAX</th>
            <th>4PAX</th>
             <th>5PAX</th>
              <th>6PAX</th>
              <th>SRS</th>
              <th> Action</th>
        </tr>

 @foreach ($luxury as $datal)
          <tr>
                       <td>{{ $datal->id }}</td>
                    <td><a href="{{ route('tourcostsummary.show',$datal->id) }}"> {{ $datal->season}}</a></td>  
                    <td>{{ $datac->program }}</td>                 
                    <td>{{ $datal->twopax }}</td>
                    <td>{{ $datal->threepax }}</td>
                    <td>{{ $datal->fourpax }}</td>
                    <td>{{ $datal->fivepax }}</td>
                    <td>{{ $datal->sixpax }}</td>
                    <td>{{ $datal->srs }}</td>
                      <td><a href="/editInclusive/{{$datal->id}}"><i class="fa fa-edit"></i></a>
                     <a href="/destroy/{{$datal->id}}" onclick="return confirm('Are you sure? You want to delete {{ $datal->id}}','Inclusive')"><i class="fa fa-trash red"></i></a></td>
                    <tr>
                   @endforeach
         </table>
              </div>
        </div>
         </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

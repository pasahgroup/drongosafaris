
  @extends('admins.layouts.Apps.app')
  @section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Active group trip</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Active trip</li>
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
                    <th>Adults</th>
                    <th>Teens</th>
                    <th>Children</th>
                    <th>Tour cost($)</th>
                    <th>Total addon cost</th>
                      <th>Total cost</th>
                        <th>Total amount paid</th>
                         <th>Total amount remain</th>
                    <th>tour_type</th>

                   </tr>
                  </thead>
                  <tbody>
                      @foreach ($groupTrip as $trip)
                        <tr>
                    <td>{{ $trip->adults}}</td>  
                    <td>{{ $trip->teens}}</td> 
                    <td>{{ $trip->children}}</td> 

                    <td>{{ $trip->tour_cost}}</td>  
                    <td>{{ $trip->total_Addon_cost}}</td> 
                    <td>{{ $trip->total_cost}}</td> 

                     <td>{{ $trip->amount_paid}}</td> 
                    <td>{{ $trip->amount_remain}}</td> 
                     <td>{{ $trip->tour_type}}</td>                
                      </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Adults</th>
                    <th>Teens</th>
                    <th>Children</th>
                    <th>Tour cost($)</th>
                    <th>Total addon cost</th>
                    <th>Total cost</th>
                    <th>Total amount paid</th>
                    <th>Total amount remain</th>
                    <th>tour_type</th>
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
@endsection

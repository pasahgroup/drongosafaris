
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
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Tour type</th>
                    <th>Accommodation</th>
                    <th>Unit Price($)</th>
                    <th>Total Price($)</th>
                    <th>Addon Price($)</th>
                       <th>Total Addon Price($)</th>
                     <th>Total Cost($)</th>
                    <th>Adults</th>
                    <th>Teens</th>
                     <th>Children</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th>Email</th>
                     <th>Travel date</th>
                     <td>PIN</td>
                         <th>Other info.</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($customers as $customer)
                  <tr>
                    <td>{{ $customer->id }}</td>
                    <td><a href="{{ route('programs.show',$customer->id) }}">{{ $customer->first_name }}</a></td>
                    <td>{{ $customer->last_name }}</td>

                    <td>{{ $customer->tour_type }}</td>
                    <td>{{ $customer->accommodation }}</td>
                    <td bgcolor="purple" style="font-color: text-white">{{ $customer->unit_price }}</td>
                    <td bgcolor="purple" style="font-color: text-white">{{ $customer->total_price }}</td>
                    <td bgcolor="yellow">{{ $customer->addon_price }}</td>
                     <td bgcolor="yellow">{{ $customer->total_addon_price }}</td>
                      <td bgcolor="green">{{ $customer->total_cost}}</td>
                    <td>{{ $customer->adults }}</td>
                    <td>{{ $customer->teens }}</td>
                    <td>{{ $customer->children }}</td>
                    <td>{{ $customer->country }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                     <td>{{ $customer->travel_date }}</td>
                       <td>{{ $customer->pin }}</td>
                      <td>{{ $customer->additional_information }}</td>
                  </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                   <th>#</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Tour type</th>
                    <th>Accommodation</th>
                    <th>Unit Price($)</th>
                    <th>Total Price($)</th>
                    <th>Addon Price($)</th>
                    <th>Total Addon Price($)</th>
                     <th>Total Cost($)</th>
                    <th>Adults</th>
                    <th>Teens</th>
                     <th>Children</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th>Email</th>
                     <th>Travel date</th>
                     <td>PIN</td>
                         <th>Other info.</th>
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

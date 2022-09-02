
  @extends('admins.layouts.Apps.app')
  @section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tours Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tours Page</li>
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
          <h3 class="card-title">Tours</h3>

        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="card">

                    <div class="card-body">
                      <h4 class="card-title">{{ $programs->tour_name }}</h4>
                      <p class="card-text">
                        {{ $programs->itinerary_summury }}
                      </p>
                   </div>
                 
                    @foreach ($datas as $data)
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                          <h5 class="m-0"> Day {{ $data->day }} - {{ $data->itinerary_title }}</h5>
                        </div>
                        <div class="card-body">
                          <p class="card-text">{{ $data->itinerary_description }}</p>
                      
                        <p class=""><span class=""> Destination: </span><b>{{ $data->destination_name }} </b></p>

                              <p class=""><span class=""> Distance: </span><b>{{ $data->distance }} </b>Km</p>
                                <p class=""><span class=""> Transport: </span><b>{{ $data->transport }} </b></p>
                                  <p class=""><span class=""> Destination: </span><b>{{ $data->destination_name }} </b></p>
                                  <span class=""> Accommodation: </span><b>{{ $data->accommodation_name }} </b></p>
                               <span class=""> Meal Plan: </span><b>{{ $data->meal }} </b></p>

                          <a href="{{ route('itineraries.edit',$data->id) }}" class="btn btn-primary float-right">Edit</a>
                        </div>
                      </div>
                      @endforeach


                  </div>
              </div>
        </div>

  </div>
  
    </section>
  </div>
@endsection


  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Accommodation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Accommodation</li>
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
                  Accommodation
                </h3>
              </div>
              <div class="container-fluid x_content">

            <div class="card-body">
                @foreach ($accommodations as $accommodate)


                <h6> Destination Name: {{ $accommodate->accommodation_name }} </h6>
                <h6> Category: {{ $accommodate->category }}</h6>
                <h6> Price: {{ $accommodate->price }} {{ $accommodate->currency }}</h6>
                <h6> Type: {{ $accommodate->type }}</h6>
                <h6> Descriptions: {{ $accommodate->accommodation_descriptions }}</h6>
                <h6> Location: {{ $accommodate->location_name }}</h6>
                <h6> SEO: {{ $accommodate->seo }}</h6>
                <h6> Attachments: </h6>
                @foreach ($attachments as $attach)
                <img src="{{URL::asset('storage/uploads/'.$attach->attachment)}}" alt="" width="300px">
                @endforeach
                @endforeach


            </div>
          <!-- /.col-->
        </div>
    </section>
  </div>

@endsection

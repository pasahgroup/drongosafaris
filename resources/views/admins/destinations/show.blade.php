
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Destination Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Destinations</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class=" container-fluid content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Destination</h3>
              </div>
              <div class="container-fluid x_content">

            <div class="card-body">
                @foreach ($destinations as $destine)


                <h6> Destination Name: {{ $destine->destination_name }} </h6>
                <h6> Category: {{ $destine->category }}</h6>
                <h6> Popularity: {{ $destine->popularity }}</h6>
                <h6> Descriptions: {{ $destine->destination_description }}</h6>
                <h6> SEO: {{ $destine->seo }}</h6>
                <h6> Attachments: </h6>
                @foreach ($attachments as $attach)
                <img src="{{URL::asset('storage/uploads/'.$attach->attachment)}}" alt="" width="300px">
                @endforeach
                @endforeach


            </div>

                <br />

          <!-- /.col-->
        </div>
    </section>
  </div>

@endsection

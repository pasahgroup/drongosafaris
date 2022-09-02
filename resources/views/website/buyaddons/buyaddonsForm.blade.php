<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/fv-icon.png" type="image/gif">
    <title>Jetrip</title>
    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--animate.css-->
    <link rel="stylesheet" href="css/animate.min.css">
    <!--fontawesome 5-->
    <link rel="stylesheet" href="css/all.min.css">
    <!--lity.css-->
    <link rel="stylesheet" href="css/lity.min.css">
    <!--slicknav.css-->
    <link rel="stylesheet" href="css/slicknav.min.css">
    <!--slickslider.css-->
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/slick.css">
    <!-- Custom.css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

   </head>
@extends('website.layouts.apps')
@section('content')

      <!-- service-section -->
    <section class="service-one ws-section-spacing bg-gray">
        <div class="container">
          <b>ADD-ONS PROGRAMS</b>
           <div class="search_area search_area_two">
                <form  method="post" id="post_form" action="{{ route('buy-addons.store') }}">                           
                                  @csrf                                                    
                                <div class="row">
                                  @foreach ($addons as $addon)                                 
                                  <div class="col-lg-4">
                                  {{$addon->addon_name}}: <b>{{$addon->price}}{{$addon->currency}}</b>
                                   </div>
                                     <div class="col-lg-2">
                                     <div class="form-group">
                                        <input type="checkbox" class="zt-control"  name="hear[]" value="{{$addon->addon_name}}"/>
                                      </div>
                                      </div>                                  
                                  @endforeach
                                   </div>
                                   
                                  <br>
                                    <div class="row">
                                     <div class="col-lg-9">
                                      <div class="form-group">
                                        <input type="hidden" class="zt-control"  name="program_id" value="{{$id}}"/>
                                      </div>
                                   </div>
                                   
                                      <div class="col-lg-3">
                                     <button type="submit" class="btn-tour">Save</button>
                                   </div>
                                 </div>
                                </form>
                              </div>
               
        </div>
    </section>

 
    <!-- End-footer-section -->
    <!-- Back to top button -->
    <a id="btn-to-top" class="show"></a>
    <!-- Jquery.min.js-->
    <script src="js/jquery.1.12.4.js"></script>
    <!--bootstrap.min.js-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <!--slicknav.min.js-->
    <script src="js/jquery.slicknav.min.js"></script>
    <!--slickslider.min.js-->
    <script src="js/slick.min.js"></script>
    <!-- counterup.min.js -->
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- magnific-popup.js -->
    <script src="js/lity.min.js"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/imagesloaded.js"></script>
    <!-- main.js -->
    <script src="js/main.js"></script>

</body>

</html>
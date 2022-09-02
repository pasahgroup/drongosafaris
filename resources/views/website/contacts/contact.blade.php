@extends('website.layouts.apps')
@section('content')

     <section class="">
        <div class="container">
        <a href="#"></a>
        <div class="row"> 
           <div class="col-lg-12 col-md-12 col-sm-12 ">
            <p class="text-center">
              @isset($contacts->title)
             <b> {{$contacts->title}}</b> 
              @endisset
            </p>
           </div> 
        </div>
            <div class="row"> 
            @if($contacts)               
                <div class="col-lg-3 col-md-6 col-sm-12 ">
                    <div class="contact-box">
                        <div class="icon-box">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="con-diss">
                            <h4> Address </h4>                        
                            
                                              @isset($contacts->address)
             <b> {{$contacts->address}}</b> 
              @endisset
                          
                        </div>
                    </div>
                 </div>
                <!-- item -->
                <div class="col-lg-3 col-md-6 col-sm-12 ">
                    <div class="contact-box">
                        <div class="icon-box">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="con-diss">
                            <h4> Contact No.</h4>
                            <p>{{$contacts->phone}}</p>
                        </div>
                    </div>
                </div>
                <!-- item -->
                <div class="col-lg-3 col-md-6 col-sm-12 ">
                    <div class="contact-box">
                        <div class="icon-box">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="con-diss">
                            <h4>Email</h4>
                            <p> <a href="#">{{$contacts->email}}</a> </p>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-3 col-md-6 col-sm-12 ">
                    <div class="contact-box">
                        <div class="icon-box">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="con-diss">
                            <h4>Website </h4>
                            <p> <a href="#">{{$contacts->website}}</a> </p>
                        </div>
                    </div>
                </div>
                  @endif
                <!-- item-end -->
            </div>
            <hr>
            <div class="row mt-5">
                <div class="col-lg-6 col-md-12">
                    <div class="map" id="map" title="name">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                   <form method="post" id="post_form" action="{{ route('contacts.store') }}">
                             @csrf
                           <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="full name" name="full_name"
                                        required="">
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="email"
                                        name="email" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="uname" placeholder="Subject" name="subject"
                                        required="">
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone"
                                        name="phone">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <textarea class="form-control" name="comment"
                                    placeholder="Your Comment"></textarea>
                            </div>
                        </div>
                         <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
 <script src="map/main.js"></script>
         <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgIfLQi8KTxTJahilcem6qHusV-V6XXjw&amp;callback=initMap">          
        </script>
@endsection


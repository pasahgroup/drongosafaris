
@extends('website.layouts.apps')
@section('content')
  <section class="bg-gray ">
        <div class="container">   
                  
                 <a href="#"></a>
                 <div class="row justify-content-center">
                 <div class="col-lg-10">
                  <div class="search_area search_area_two booking-tour">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="center-title ">
                                    <h5 class="title">Submit your Comment for review</h5>
                                </div>
                            </div>
                        </div> 
                  
              <form  method="post" id="post_form" action="{{ route('Testimonies.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">  <input type="hidden" name="status" value="0">           
                    
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group row">
                      <label for="full_name" class="ontrol-label">Full Name</label>
                      <div class="col-sm-8 col-md-8">
                        <input type="text" class="form-control" name="full_name"   placeholder="full name" value="">
                      </div>
                        </div>
                     </div>
                      
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group row">
                                  <label for="rank" class="ontrol-label">Rate us(1-5)</label>
                                  <div class="col-sm-8 col-md-8">
                                    <select name="rank" id="" class="form-control">
                                      <option value="">--Select Category--</option>
                                      <option value="1">1</option>
                                        <option value="2">2</option>
                                       <option value="3">3</option>
                                         <option value="4">4</option>
                                           <option value="5">5</option>
                                    </select>
                                  </div>
                                </div>
                    </div>

                  <div class="col-md-12 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Comments
                       </label>                    
                        <textarea rows="3" name="comments" placeholder="Type your comments here..." style="width:  100%" max="180"></textarea>
                  </div>
                <hr>
              <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="form-group row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                           <label class="control-label" for="first-name">Upload your Photo</label>
                           <input name="attachment[]" type="file"  multiple required="">
                           <img src="attachment[]" alt="Girl in a jacket" width="30" height="50"  style="width:30px;height:50px;">
                       </div>                  
                </div>
              </div>

               <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                      <div class="form-group row">
                    <div class="col-md-6 col-sm-12">             
                   <button type="submit" class="btn btn-primary float-right">Submit</button>
              </div>
              </div>
               </div>

                </div>              
              </form>
       
             </div>
                    </div>
                    </div>
              </div>
         
    </section>
@endsection


@extends('website.layouts.apps')
@section('content')

  <section class="bg-gray ">
        <div class="container">   
                  
                 <a href="#"></a>
               <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="search_area search_area_two booking-tour">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="center-title ">
                                    <h5 class="title">Agent Restration Form</h5>
                                                       </div>
                            </div>
                           
                        </div>
                        <!--Search Form-->
                             @if($message = Session::get('success'))
  <div class="alert alert-success">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">&times;</span></button>
    <strong>Well!: </strong> {{$message}}
  </div>
  @endif
   @if($message = Session::get('info'))
  <div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">&times;</span></button>
    <strong>Ops!: </strong> {{$message}}
  </div>
  @endif 
                           <form  method="post"  action="{{ route('Agents.store') }}" enctype="multipart/form-data">
                             @csrf
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <label for="">First name:</label>
                                    <div class="form-group">    

                                        <input type="text" name="first_name" class="form-control" placeholder="first name" min="2">
                                    </div>
                                </div>

                                 <div class="col-lg-5 col-md-12 col-sm-12">
                                    <label for="">Last name:</label>
                                    <div class="form-group">    

                                        <input type="text" name="last_name" class="form-control" placeholder="last name" min="2">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <label for="">Nationality:</label>
                                    <div class="form-group">
                                        <input type="text" name="nationality" class="form-control" s placeholder="Nationality" min="2">
                                    </div>
                                </div>
                                  <div class="col-lg-5 col-md-12 col-sm-12">
                                     <label for="">Language(Mother Toung):</label>
                                     <div class="form-group icon_down">
                                        <select class="form-control" name="language">
                                              <option value="0">--Speaking Language--</option>
                                            <option value="English">English</option>
                                            <option value="France">France</option>
                                              <option value="Germany">Germany</option>
                                            <option value="Italian">Italian</option>
                                            <option value="Spain">Spain</option>
                                             <option value="Portguise">Portguise</option>

                                            <option value="Indian">Indian</option>
                                            <option value="Chinise">Chinise</option>
                                              <option value="Other">Other Language</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                   <label for="">Your Phone:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="phone" >
                                        
                                    </div>
                                </div>
                         
                                <div class="col-lg-5 col-md-6 col-sm-12">
                                   <label for="">Email:</label>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="email" name="email">
                                    </div>
                                    </div>

                                <div class="col-lg-3 col-md-6 col-sm-12">
                                   <label for="">Photo:</label>
                                    <div class="form-group">
                                    <input type="file" name="attachment[]" onChange="displayImage(this)" id="attachment" accept="image/*" class="" style="display:block;"> 
                                   
                                </div>
                                </div>
        <div class="col-lg-6 col-md-6 col-sm-12">

            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="images/no.png" onClick="triggerClick()" id="profileDisplay">
            </span>
            </div>
                            
            <hr>
               <div class="col-md-12">
               <label for="">Additional Information we should know?</label>
                <div class="form-group">                 

         <textarea rows="2" name="additional_information" placeholder="Additional information here..." style="width:  100%" ></textarea>
        </div>
     </div>

      
       <div class="">
      
        <div class="col-lg-12 col-md-12 col-sm-12">
         <span> How did you hear about us.?</span>
           </div>
       <br>
        @foreach($socialmedias as $media)
       <div class="col-lg-4 col-md-4 col-sm-4">
                                   <label for="">{{$media->social_name}}
                                    <div class="form-group">
                                       <input id="facebook" type="checkbox"  name="hear[]" value="{{$media->social_name}}">
                                       </label>
                                    </div>
                                </div>
                                @endforeach
                              </div> 

                                                        
                                       <div class="col-lg-12 mt-3">
                                         <label for=""> Other Media:</label> 
                                     <textarea rows="2" name="hear_about_us" placeholder="hear about us..." style="width:  100%">
                                </textarea>
                                  </div>                          
                                    <hr>
                                   <div class="col-lg-12 mt-3">
                                <button type="submit" class="btn btn-success float-center">Submit</button>
                                  </div>       
                               </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
         
    </section>
@endsection


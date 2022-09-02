
<!-- <link rel="stylesheet" href="../../../css/bootstrap431.css"> -->
@extends('website.layouts.apps')
@section('content')
<!-- <link rel="stylesheet" href="../../../css/mform.css"> -->

<div class="container">
    <div class="card-body">
    <div class="row justify-content-center">
         
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <div class="search_area search_area_two booking-tour"> 
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h4 id="heading">Tour Guide Registration Form</h4>
                <p>Fill all form field to go to next step</p>
    
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
                    <form  method="post" id="msform" action="{{ route('Tour-Guide.store') }}" enctype="multipart/form-data">
                          @csrf
                    <!-- progressbar -->
                    <ul id="progressbar">
                      <li class="active" id="personal"><strong>Personal Details</strong></li>
                        <li id="personal"><strong>Professional</strong></li>
                        <li id="payment"><strong>Photo</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                    <h2 class="fs-title">Personal Details:</h2>
                                </div>
                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <h2 class="steps">Step 1 - 4</h2>
                                </div>
                            </div> 
                            
                            <label class="fieldlabels">First Name: *</label> <input type="text" name="first_name" placeholder="first name" />
                       
                             <label class="fieldlabels">Last Name: *</label> <input type="text" name="last_name" placeholder="last name" /> 
                        
                      
                              <label class="fieldlabels">Phone: *</label> <input type="number" name="phone" placeholder="phone" />

                              <label class="fieldlabels">Email: *</label> <input type="email" name="email" placeholder="email" />

                                
                              <label class="fieldlabels">Date of Birth: *</label> <input type="date" name="birth" placeholder="phone" /> 
                              <label class="fieldlabels">Current Occupation: *</label> <input type="text" name="occupation" placeholder="Occupation" />

                              <label class="fieldlabels">Nationality: *</label> <input type="text" name="nationality" placeholder="nationality" class="form-control" />                             
                        </div> 
                        
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                            <div class="form-card">
                            <div class="row">                             
                                 <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                    <h2 class="fs-title">Professional:</h2>
                                </div>
                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <h2 class="steps">Step 2 - 4</h2>
                                </div>
                             </div>


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label for="">Maximum Level of Education We Should Know?(PHD,Master,Degree,Diploma,form six etc.)</label>
                <div class="form-group">                 

         <textarea rows="2" name="education_level"  maxlength="240" placeholder="PHD,Master,Degree,Diploma,form six etc List here separate by comma ..." style="width:  100%" ></textarea>
        </div>
     </div>
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label for="">Any proffessional you have which We should Know plus its level?(Diploma of Tour guide,Degree of Information Technology,diploma of Mountain climbing,Electricity etc)</label>
                <div class="form-group">                 

          <textarea rows="2" name="professional"  maxlength="240"  placeholder="List here separate by comma ..." style="width:  100%" ></textarea>
        </div>
        </div>


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label for="">Working Experience We Should Know?(eg.Kibo tour Safaris as Tour Operator,Driver year 2002-2007,Honeyguide as Data Entry and Receptionalist year 2007-2020 etc.)</label>
                <div class="form-group">                 

         <textarea rows="2" name="work_experience"  maxlength="240"  placeholder="List here separate by comma as example above..." style="width:  100%"></textarea>
        </div>
       </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label for="">Classes of Driving License(Class A,B,C,D etc)</label>
                <div class="form-group">                 

         <textarea rows="2" name="driving_license"  maxlength="120"  placeholder="List here separate by comma ..." style="width:  100%" ></textarea>
        </div>
     </div>
                               
                                     <label for="">Language(Mother Tongue):</label>
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
                                            <option value="Chinese">Chinese</option>
                                                <option value="Swahili">Swahili</option>
                                              <option value="Other">Other Language</option>
                                        </select>
                                    </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label for="">Other languages we should know(French,Spain,chinese etc.)?</label>
                <div class="form-group">                 

         <textarea rows="2" name="other_language"  maxlength="120" placeholder="List here separate by comma..." style="width:  100%"></textarea>
        </div>
        </div>


                       </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                            
                              <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                    <h2 class="fs-title">Photo:</h2>
                                </div>
                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <h2 class="steps">Step 3 - 4</h2>
                                </div>
                              </div>

       
  <div class="col-lg-3 col-md-6 col-sm-12">
                                   <label for="">Photo:</label>
                                    <div class="form-group">
                                    <input type="file" name="photo[]" onChange="displayImage(this)" id="photo" accept="image/*" class="" style="display:block;"> 
                                   
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       
                             <label class="fieldlabels">Upload Your CV in PDF format:</label> <input type="file" name="cv[]" id="cv" accept="image/.pdf">
      </div>

      
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <span> How did you hear about us.?</span>
           </div>
       <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @foreach($socialmedias as $media)
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                   <label for="">{{$media->social_name}}
                                    <div class="form-group">
                                       <input id="facebook" type="checkbox"  name="hear[]" value="{{$media->social_name}}">
                                    </div></label>
                                </div>
                                @endforeach
                              </div>


   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label for="">Other Media:</label>
                <div class="form-group">                 

         <textarea rows="2" name="hear_about_us"  maxlength="240"  placeholder="List here separate by comma as example above..." style="width:  100%" ></textarea>
        </div>
       </div>

                        </div>
                        <input type="submit" name="next" class="next action-button" value="Submit" /> 
                      
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>Success..!</strong></h2> <br>
                            <div class="row justify-content-center">
                                <p><p>
                                <div class="col-3"> <img src="../../assets/corporate/img/logos/logo-corp-red.png" class="fit-image" style="height:50vh; width: 80%"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You have Successfully Registered</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    </div>
</div> 
@endsection
<script type="text/javascript" src="../../../js/jquery321.min.js"></script>
<script type="text/javascript" src="../../../js/bootstrap431.bundle.min.js"></script>

<script type="text/javascript">
    
$(document).ready(function(){
var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);
$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});
</script>
                                                         
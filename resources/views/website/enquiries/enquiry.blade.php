
<!-- <link rel="stylesheet" href="../../../css/bootstrap431.css"> -->
@extends('website.layouts.apps')
@section('content')
<!-- <link rel="stylesheet" href="../../../css/mform.css"> -->

<div class="container">
    <div class="row justify-content-center">
         
        <div class="">
        <div class="search_area search_area_two booking-tour"> 
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h4 id="heading">Enquiry Form</h4>
                <p>Fill all form field to go to next step</p>
                <form id="msform"  method="post"  action="{{ route('enquiry.store') }}">
                    @csrf
                    <!-- progressbar -->
                    <ul id="progressbar">
                      <li class="active" id="account"><strong>Personal Details</strong></li>
                        <li id="personal"><strong>Additional Information:</strong></li>
                        <li id="payment"><strong>Enquiry</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Personal Details:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                </div>
                            </div> 
                           
                            <label class="fieldlabels">First Name: *</label> <input type="text" name="first_name" placeholder="first name" /> 
                             <label class="fieldlabels">Last Name: *</label> <input type="text" name="last_name" placeholder="last name" /> 
                              <label class="fieldlabels">Phone: *</label> <input type="number" name="phone" placeholder="phone" /> 
                              <label class="fieldlabels">Email: *</label> <input type="number" name="email" placeholder="email" /> 

                            <label class="fieldlabels">Nationality: *
                            </label>
                             <input type="text" name="nationality"/> 
                        </div> 
                        
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                            <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Additional Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 4</h2>
                                </div>
                             </div>

                                <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                   <label for="">Adults (>16 yrs):</label>
                                    <div class="form-group">
                                        <input type="number" class="zt-control" name="adults" min="0">
                                    </div>
                                </div>

                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                   <label for="">Teens (12-14 yrs):</label>
                                    <div class="form-group">
                                        <input type="number" class="zt-control" name="teens" min="0">
                                    </div>
                                 </div>

                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                   <label for="">Children (5-12 yrs):</label>
                                    <div class="form-group">
                                        <input type="number" class="zt-control" name="children" min="0">
                                    </div>
                                </div>
                                 </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                 
                                  <label for="">Tour of Interest:</label>
                                <div class="form-group">
                                        <select class="form-control" name="tour_id">

                                              <option value="{{$tours->id}}">{{$tours->tour_name}}</option>
                                              @foreach($programs as $program)
                                            
                                            <option value="{{$program->id}}">{{$program->tour_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                   <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                   <label for="">Accommodation:</label>
                                    <div class="form-group">
                                       <select class="form-control" name="accomodation">
                                            <option value="0">--Select Accomodation--</option>
                                            <option>Basic</option>
                                             <option>Comfort</option>
                                              <option>Deluxe</option>
                                               <option>Mix</option>
                                                <option>Not Sure</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                   <label for="">Departure Date:*</label>
                                    <div class="form-group">
                                        <input type="date" class="zt-control" name="arrival_date" placeholder="arrival date">
                                    </div>
                                </div>
                                </div>
                            
                        </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Enquiry:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 4</h2>
                                </div>
                                <label for="">Your Enquiry:*</label>
                                <textarea name="other_information" required="true">
                                </textarea>  
                                </div>
                          </div> 
                             
                        
                        <input type="submit" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
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
                            <h2 class="purple-text text-center"><strong>Success!</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
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
                                                         
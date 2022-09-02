@extends('admins.layouts.Apps.app')
@section('contents')
 <link href="../../img_library/main.css" rel="stylesheet">
    <link href="../../img_library/mform.css" rel="stylesheet">

<div class="content-wrapper">
  <div class="cotainer">
   
      <div class="row justify-content-center">
          <div class="col-md-8">
   <div class="form-group row">

                              <label for="email_address" class="col-md-4 col-form-label text-md-right"></label>

                              <div class="col-md-4">
                                  <img src="../../img/logo.png" style="height: 80px;width: 400;" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

                              </div>
                          </div>
              <div class="card">
                  <div class="card-header" style="background-color:seagreen;"><h3 class="text-center text-white">User Registration</h3></div>
                  <div class="card-body">  

                 <form  method="post"  action="{{ route('register.post') }}" enctype="multipart/form-data">
                          @csrf
                                                  
                         <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                   <x-label for="password_confirmation" :value="__('Full Name')" />
                                     <div class="form-group icon_down">
                                 <input type="text" id="name" class="form-control" name="name" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                                    </div>
                                </div>
                          </div>

                          
                         <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                   <x-label for="password_confirmation" :value="__('Email')" />
                                     <div class="form-group icon_down">
                                     <input type="text" id="email_address" class="form-control" name="email" required autofocus>

                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                                    </div>
                                </div>
                           </div>
                         
                        <div class="row">
                           <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                   <x-label for="password_confirmation" :value="__('Password')" />
                                     <div class="form-group icon_down">
                                      <input type="password" id="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                                    </div>
                                </div>
                       
                           <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                   <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                     <div class="form-group icon_down">
                                      <input type="password" id="confirm_password" class="form-control" name="confirm_password" required>

                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                                    </div>
                                </div>
                         </div>

                        <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                   <x-label for="password_confirmation" :value="__('Role')" />
                                     <div class="form-group icon_down">
                                        <select class="form-control" name="role">
                                              <option value="0">--Select User Role--</option>
                                            <option value="Admin">Admin</option>\
                                             <option value="Account">Account</option>
                                            <option value="Agents">Agent</option>
                                             <option value="Employee">Employee</option>
                                            <option value="Marketing Officer">Marketing Officer</option>                                             
                                            <option value="Tour Guide">Tour Guide</option>
                                            <option value="Partiner">Partiner</option>
                                              <option value="Cultural">Cultural</option>
                                        </select>
                                    </div>
                                </div>
                             </div>

                <div class="row">
                 <div class="col-lg-3 col-md-12 col-sm-12">
                                    <x-label for="password_confirmation" :value="__('Photo')" />
                                    <div class="form-group">
                                    <input type="file" name="attachment[]" onChange="displayImage(this)" id="attachment" accept="image/*" class="" style="display:block;"> 
                                   
                                </div>
                                </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">               
              </div>
              <img src="images/no.png" onClick="triggerClick()" id="profileDisplay">
            </span>
            </div>
           </div>

                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">

                                  <div class="checkbox">

                                      <label>

                                          <input type="checkbox" name="remember"> Remember Me

                                      </label>

                                  </div>
                              </div>
                         
                          </div>

  
                   <div class="row">
                 <div class="col-lg-6 col-md-12 col-sm-12">                                    
                                   <a href="/user-list" role="button" class="btn btn-success">
                                  Back
                              </a>
                                </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
           <button type="submit" class="btn btn-primary float-right">
                                  Register
                              </button>

            </div>
           </div>
            </form>

                        

                  </div>
              </div>

          </div>

      </div>
  </div>
</main>
<script src="../../img_library/scripts.js" type="text/javascript"></script>
@endsection


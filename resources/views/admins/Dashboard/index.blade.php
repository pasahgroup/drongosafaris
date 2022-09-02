
  @extends('admins.layouts.Apps.app')
  @section('contents')
   <style type="text/css">
    .red{
      color: red;
    }
    .green{
      color: green;
    }
     .blue{
      color: blue;
    }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Welcome:<b> {{auth()->user()->name}}</b></h3>

          <div class="card-tools">
             <a href="/contacts" class="btn btn-success" >
              <i class="fas fa-plus"></i> Contacts(<b class="red">{{$contacts}}</b>)
            </a>
             <a href="/enquiry" class="btn btn-default" >
              <i class="fas fa-plus"></i> Enquiry(<b class="red">{{$enquiries}}</b>)
            </a>
             <a href="/tailorMade" class="btn btn-success" >
              <i class="fas fa-plus"></i> Tailor Made(<b class="red">{{$tailorMades}}</b>)
            </a>
             <a href="/activeGroupTrip" class="btn btn-primary" >
              <i class="fas fa-plus"></i> Active Group(<b class="red">{{$activeGroupTrip}}</b>)
            </a>
          </div>
        </div>
        <div class="card-body">
            <div class="card-body">
               <div class="span12">
              <div class="action-nav-normal">
              <div class="row-fluid">
               <div class="span2 action-nav-button">
 @if(Auth::user()->role == 'Admin' || Auth::user()->role =='accountant')
                        <a href="/customers">
                        <i class="fa fa-users"></i>
                        <span>Customers(<b class="blue">{{$customers}}</b>)</span>

                        </a>

                    </div>

                    <div class="span2 action-nav-button">
                        <a href="/Agents">

                        <i class="fa fa-dollar-sign"></i>
                         <span>Agents(<b class="blue">{{$agents}}</b>)</span>
                        
                        </a>
                    </div>
                     <div class="span2 action-nav-button">
                        <a href="/Partner">

                        <i class="fa fa-dollar-sign"></i>
  <span>Partiners(<b class="blue">{{$partiners}}</b>)</span>
                    
                        </a>

                    </div>
                     <div class="span2 action-nav-button">
                        <a href="/Tour-Guide">

                        <i class="fa fa-dollar-sign"></i>
  <span>Tour-Guide(<b class="blue">{{$tourGuides}}</b>)</span>
                        
                        </a>

                    </div>
                    @endif
                    @if(Auth::user()->role == 'Admin' || Auth::user()->role =='accountant' || Auth::user()->role =='Cultural')
                     <div class="span2 action-nav-button">
                        <a href="/Tour-Guide">

                        <i class="fa fa-dollar-sign"></i>
                        <span>Tour-Guide(<b class="blue">{{$tourGuides}}</b>)</span>
                        
                        </a>

                    </div>
                    @endif
                  </div>
                </div>
              </div>
              </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
 
@endsection
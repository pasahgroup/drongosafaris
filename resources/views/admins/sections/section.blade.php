
  @extends('admins.layouts.Apps.app')
  @section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Main content -->
    <section class=" container-fluid content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
             <div class="container-fluid x_content">              
              <form  method="post" action="{{ route('page.update',$id) }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                @foreach($pages as $page)
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="card-body">
                  <div>
                    <label>Page Title</label>
                    <input class="form-control" type="text" name="page_title" placeholder="Page Title" value="{{$page->page_title}}">
                  </div>
                   <div>
                    <label>Meta Descriptions</label>
                    <input class="form-control" type="text" name="meta_descriptions" placeholder="Descriptions" value="{{$page->meta_descriptions}}">
                  </div>
                   <div>
                    <label>Meta Keywords</label>
                    <input class="form-control" type="text" name="meta_keywords" placeholder="Meta Keywords" value="{{$page->meta_keywords}}">
                  </div>
                 
                  <div>
                    <label>Page Image Cover</label>
                    <input class="form-control" type="file" name="attachment">
                  </div>

                <div>
                    
            <label>Select Page Section Number</label>
            <select name="section_no"  id="section_no" class="form-control">
            <option>{{$page->section_no}}</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            </select>
                  </div>
                  @endforeach

            
      <hr>
       <div class="form-group row">
              <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
              <div>
              <button type="submit" class="btn btn-primary float-right" name="page" value="save page">Update</button>         
              </div>
                  </div>
                </div>
                 </div>               
            </form>
           <form  method="post" id="post_form" action="{{ route('page.store') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf   
      <div class="row">
       
        <div class="col-5">
               
          <h5>Select Number of section</h5>
          <select name="section_no"  id="section_no" class="form-control">
            <option>1</option>
            <option>2</option>
            <option >3</option>
            <option>4</option>
          </select>

           <button type="submit" class="btn btn-primary float-right" name="section_no" value="Section no">Submit</button>
          </div>  
      </form>
    

<div class="col-7">
{{$page->section_no}}
@for ($i = 0; $i <$page->section_no; $i++)
    The current value is {{ $i }}
@endfor

</div>

<div class="col-12">
<div class="row">    
<div class="card card-body">
  <div class="card-header">Columns <button class="btn btn-primary" style="margin-right: 2px;">1</button><button class="btn btn-primary" style="margin-right: 2px;"> 2 </button><button class="btn btn-primary" style="margin-right: 2px;">3</button><button class="btn btn-primary" style="margin-right: 2px;"> 4 </button></div>
<div class="card-body">
  <div class="row">
  <div class="col-4">
 <select class="form-control">
   @foreach($widgets as $widget)
   <option>{{$widget->widget_name}}</option>
   @endforeach
 </select>
</div>
<div class="col-4">
 <select class="form-control">
   @foreach($widgets as $widget)
   <option>{{$widget->widget_name}}</option>
   @endforeach
 </select>
</div>
<div class="col-4">
 <select class="form-control">
   @foreach($widgets as $widget)
   <option>{{$widget->widget_name}}</option>
   @endforeach
 </select>
</div>
</div>
</div>  
</div>
</div>
</div>




<div class="col-12">
<div class="row">

<div class="col-4">
 <select class="form-control">
   @foreach($widgets as $widget)
   <option>{{$widget->widget_name}}</option>
   @endforeach
 </select>
</div>
<div class="col-4">
 <select class="form-control">
   @foreach($widgets as $widget)
   <option>{{$widget->widget_name}}</option>
   @endforeach
 </select>
</div>
<div class="col-4">
 <select class="form-control">
   @foreach($widgets as $widget)
   <option>{{$widget->widget_name}}</option>
   @endforeach
 </select>
</div>


</div>  

</div>

<br>
<br>

        <div class="col-6 border">
          <h5>Widget List</h5>
          <form method="post" action="{{route('page.store')}}">
            @csrf
          @foreach($widgets as $widget)
         
          <input type="hidden" name="page_id" value="{{$id}}">
          <button type="submit" class="btn btn-secondary text-left" style="margin-bottom: 2px; min-width: 400px;" name="widget_id" value="{{$widget->id}}">
          {{$widget->widget_name}}     <span class="fa fa-angle-right float-right"></span></button>
          <br>
          @endforeach
          </form>
        </div>


        <div class="col-6 border">
             <h5>Page Content</h5>
             @isset($page_widgets)
            <form method="post" action="{{route('page.destroy',$id)}}">
            @csrf
            <input type="hidden" name="_method" value="delete">
          @foreach($page_widgets as $widget)
          <input type="hidden" name="page_id" value="{{$id}}">
          <button type="submit" class="btn btn-success text-right" style="margin-bottom: 2px; min-width: 400px;" name="widget_id" value="{{$widget->id}}">
          {{$widget->widget_name}}     <span class="fa fa-angle-left float-left"></span></button>
          <br>
          @endforeach
          </form>
          @else
          <p class="alert alert-info text-center"><span class="fa fa-eye"> </span> No widget assigned</p>
          @endisset
        </div>
      </div>
            
        </div>
    </section>
  </div> 

@endsection

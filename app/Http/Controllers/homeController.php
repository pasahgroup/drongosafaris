<?php

namespace App\Http\Controllers;
use App\Models\widget;
use App\Models\page;
use App\Models\pageWidget;
use Illuminate\Http\Request;
use DB;
use Auth;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = page::get();
        return view('admins.pages.pages',compact('pages'));
    }
    public function addPage()
    {
        return view('admins.pages.addPage');
    }

    public function widget(){

         return view('admins.pages.addWidget');
    }

     //Display all tour gallery photos
    public function galleries()
    {
        $pages = page::get();
        return view('website.galleries.gallery',compact('pages'));
    }

//Edit Widget
  
    public function editWidget($id){
       
       $widgets = widget::where('id',$id)
       ->first();
     //  dd($widgets);
         return view('admins.pages.editWidget',compact('widgets'));
    }

    //Wildget List
      public function widgetList(){

        $widgets = widget::get();
         return view('admins.pages.widgetList',compact('widgets'));
    }

    //main page 
    public function mainPage($id){
        $pages= page::whereid($id)->first();
        $widgets= pageWidget::join('widgets','widgets.id','page_widgets.widget_id')
        ->where('page_widgets.page_id',$id)
        ->get();
        return view('website.mainpage.mainpage',compact('pages','widgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request('widget')) {
        $widget = widget::UpdateOrCreate([
        'widget_name'=>request('widget_name')],
        ['widget_descriptions'=>request('widget_descriptions'),
        'user_id'=>auth::id()            
           ]);
                  
           return redirect()->back()->with('success','Widget created successfully');
        }
        // Create new page
        if(request('page')){
           $widget = page::UpdateOrCreate([
        'page_title'=>request('page_title')],
        ['widget_descriptions'=>request('widget_descriptions'),
        'user_id'=>auth::id()            
           ]);


          $page =  page::create(request()->all());

          return redirect()->route('page.show',$page->id)->with('success','Page created successfully');

        }
        // assign widget to the page
        if(request('widget_id')){
            if (pageWidget::where('page_id',request('page_id'))->where('widget_id',request('widget_id'))->exists()) {
                 return redirect()->back()->with('error','This widget already assigned');
             }
             else{
                 $assign_widget = pageWidget::create([
                'page_id'=>request('page_id'),
                'widget_id'=>request('widget_id'),
                'user_id'=>auth()->id()
            ]);
            return redirect()->back()->with('success','Widget assigned successfully');
             }
        }

     // assign widget to the page
        // if(request('widget_id')){
        //     if (pageWidget::where('page_id',request('page_id'))->where('widget_id',request('widget_id'))->exists()) {
        //          return redirect()->back()->with('error','This widget already assigned');
        //      }
        //      else{
        //          $assign_widget = pageWidget::create([
        //         'page_id'=>request('page_id'),
        //         'widget_id'=>request('widget_id'),
        //         'user_id'=>auth()->id()
        //     ]);
        //     return redirect()->back()->with('success','Widget assigned successfully');
        //      }
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       $widgets=DB::select("select id,widget_name from widgets where id not in(select widget_id from page_widgets where page_id=$id)");
      // dd($widgets);

        $pages = page::whereid($id)->get();
        $page_widgets = pageWidget::join('pages','page_widgets.page_id','pages.id')
        ->join('widgets','page_widgets.widget_id','widgets.id')
        ->where('page_widgets.page_id',$id)->get();
        
          return view('admins.sections.section',compact('widgets','pages','id','page_widgets'));
    }

public function sectionNumber($n)
    {
       dd($n);
        //dd(request(''))
       $widgets=DB::select("select id,widget_name from widgets where id not in(select widget_id from page_widgets where page_id=$id)");
     
        $pages = page::whereid($id)->get();
        $page_widgets = pageWidget::join('pages','page_widgets.page_id','pages.id')
        ->join('widgets','page_widgets.widget_id','widgets.id')
        ->where('page_widgets.page_id',$id)->get();
        
    return view('admins.sections.section',compact('widgets','pages','id','page_widgets'));
    }


public function section()
    {
       // $id=10;
       // dd($id);
       // $widgets=DB::select("select id,widget_name from widgets where id not in(select widget_id from page_widgets where page_id=$id)");
     
       // $pages = page::whereid($id)->get();
        // $page_widgets = pageWidget::join('pages','page_widgets.page_id','pages.id')
        // ->join('widgets','page_widgets.widget_id','widgets.id')
        // ->where('page_widgets.page_id',$id)->get();
        
    return view('admins.pages.addPage');
    }

  //Page List
      public function pageList($id){       
     
  $pages=page::get();
  //dd($pages);
        $widgets = pagewidget::join('widgets','page_widgets.widget_id','widgets.id')
        ->where('page_widgets.page_id',$id)
        ->select('widgets.*','page_widgets.page_id')
        ->get();
       // dd($widgets);
         return view('admins.pageTemplate.widgetTemplate',compact('widgets'));
    }


 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

//Create New Page
       public function createPage()
    {
        $pages = page::get();
        //dd($pages);
         return view('admins.pageTemplate.pageTemplate',compact('pages'));
    }


  //Wildget List
      public function pageWidgetList($id){

        $widgets = pagewidget::join('widgets','page_widgets.widget_id','widgets.id')
        ->where('page_widgets.page_id',$id)
        ->select('widgets.*','page_widgets.page_id')
        ->get();
       // dd($widgets);
         return view('admins.pageTemplate.widgetTemplate',compact('widgets'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = pageWidget::where('page_id',$id)->first();
        if($delete->delete()){
            return redirect()->back()->with('success','Widget removed successfully');
        }    
        else{
            return redirect()->back()->with('error','Widget not exists');
        }
    }
}

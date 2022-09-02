<?php

namespace App\Http\Controllers;

use App\Models\inclusive;
use App\Models\page;
use App\Models\pageWidget;
use App\Models\program;
use App\Models\accommodationInclusive;
use DB;
use Auth;
use Illuminate\Http\Request;

class InclusiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inclusives = inclusive::get();
        //dd($inclusives);
        return view('admins.inclusives.inclusiveList',compact('inclusives'));    //
    }

      public function addinclusive(){

         return view('admins.inclusives.addInclusive');
    }

     public function editInclusive($id){
       
       $inclusives = inclusive::where('id',$id)
       ->first();
     //  dd($widgets);
         return view('admins.inclusives.editInclusive',compact('inclusives'));
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
        if (request('inclusive')) {
        $inclusive = inclusive::UpdateOrCreate([
        'inclusive'=>request('inclusive_name')        
           ]);
                  
           return redirect()->back()->with('success','Widget created successfully');
        }

          // Assign Inclusive to the Tour Name
        if(request('assign')){           
        $assign = accommodationInclusive::UpdateOrCreate([
        'inclusive_id'=>request('assign'),
        'tour_id'=>request('tour_id')
         ],
        [
        'user_id'=>auth::id()            
           ]);
     return redirect()->back()->with('success','Widget created successfully');
    }
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inclusive  $inclusive
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
     $programs=program::where('id',$id)->get();       
     $inclusives=DB::select("select id,inclusive from inclusives  where id not in(select (inclusive_id)id from accommodation_inclusives where tour_id =$id)");
        //dd($inclusives);

        $pages = page::whereid($id)->get();
        $assignLists = accommodationInclusive::join('inclusives','accommodation_inclusives.inclusive_id','inclusives.id')
        ->where('accommodation_inclusives.tour_id',$id)->get();
        //dd($assignLists);


          return view('admins.inclusives.assignInclusiveList',compact('inclusives','id','assignLists','programs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inclusive  $inclusive
     * @return \Illuminate\Http\Response
     */
    public function edit(inclusive $inclusive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inclusive  $inclusive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
  
      $toupdate = inclusive::where('id',$id)
               ->update([
            'inclusive'=>request('inclusive_name')
        ]);
    return redirect()->route('inclusive.index')->with('success','Widget created successfully');
    }
//Update program name from inclusive Page

  public function inclusiveUpdate(Request $request,$id)
    {
       
         $toupdate = program::where('id',$id)
               ->update([
            'tour_name'=>request('tour_name')
        ]);
    return redirect()->back()->with('success','Updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inclusive  $inclusive
     * @return \Illuminate\Http\Response
     */
    public function destroyf($id)
    {
  
        $delete = inclusive::where('id',$id)->first();
        if($delete->delete()){
            return redirect()->route('inclusive.index')->with('success','Inclusive removed successfully');
        }    
        else{
            return redirect()->route('inclusive.index')->with('error','Widget not exists');
        }
    }

     public function destroy($id)
    {
        //
        ///dd($id);
        $delete = accommodationInclusive::where('tour_id',$id)->first();
        if($delete->delete()){
            return redirect()->back()->with('success','Widget removed successfully');
        }    
        else{
            return redirect()->back()->with('error','Widget not exists');
        }
    }
}

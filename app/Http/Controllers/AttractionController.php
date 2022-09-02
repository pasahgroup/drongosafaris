<?php

namespace App\Http\Controllers;

use App\Models\attraction;
use App\Models\program;
use App\Models\title;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datas = attraction::get();
        $uniquness = attraction::
        whereIn('type',array('Wildlife','Culture & Belief','Geographical','Historical'))->get();
     

        return view('admins.attractions.attraction',compact('datas','uniquness'));
    }

   public function drongoAttraction()
    {
        $datas = attraction::where('type','None')
        ->get();
         $PostcategoryImage = title::where('title','Uniqueness')
          ->first();
          
          $historical_first=attraction::where('type','Historical')
         ->limit(1)->get()->first();
          $historical=attraction::where('type','Historical')
          ->offset(1)->limit(8)->get();

            $wildlife_first=attraction::where('type','Wildlife')
         ->limit(1)->get()->first();
          $wildlife=attraction::where('type','Wildlife')
          ->offset(1)->limit(8)->get();

          $geographical_first=attraction::where('type','Geographical')
         ->limit(1)->get()->first();
          $geographical=attraction::where('type','Geographical')
          ->offset(1)->limit(8)->get();

        $culture_first=attraction::where('type','Culture & Belief')
         ->limit(1)->get()->first();
          $culture=attraction::where('type','Culture & Belief')
          ->offset(1)->limit(8)->get();
       
         return view('website.attractions.attractionClient',compact('datas','historical_first','historical','geographical_first','geographical','culture_first','culture','wildlife_first','wildlife','PostcategoryImage'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admins.attractions.addAttraction');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $program =  attraction::UpdateOrCreate(
            [   'attraction_title'=>request('attraction_title')],
            [
                'attraction_description'=>request('attraction_description'),
                'tour_circuit'=>request('tour_circuit'),
                'type'=>request('type'),
                'user_id'=>auth()->id()
            ]);
    
      
                  
            //End of delete
            if(request('attachment')){
                $attach = request('attachment');
                foreach($attach as $attached){

                     // Get filename with extension
                     $fileNameWithExt = $attached->getClientOriginalName();
                     // Just Filename
                     $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                     // Get just Extension
                     $extension = $attached->getClientOriginalExtension();
                     //Filename to store
                     $imageToStore = $filename.'_'.time().'.'.$extension;
                     //upload the image
                     $path = $attached->storeAs('public/attraction/', $imageToStore);

                attraction::UpdateOrCreate(
               [ 'attraction_title'=>request('attraction_title')],
                [              
                'attachment'=>$imageToStore              
                ]
                );          
         
        }
      }

        return redirect()->back()->with('success','Created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attraction  $attraction
     * @return \Illuminate\Http\Response
     */
    public function show(attraction $attraction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attraction  $attraction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

 public function EditAttraction($id)
    {
      $attractions = attraction::where('id',$id)
         ->get()->first();  
         //dd($attractions);       
        return view('admins.attractions.editAttraction',compact('attractions')); 
    }

     public function attractionClient($circuit)
    {
  $title=$circuit;
      $attractions = attraction::where('tour_circuit',$circuit)
      ->get();
         $PostcategoryImage = title::where('title', $circuit)
          ->first();
        return view('website.attractions.attractionCircuit',compact('attractions','PostcategoryImage','title'));
    }

  public function attractionSummary($id)
    {
     
      //$title=$id;
      $attractions = attraction::where('id',$id)
      ->get()->first();
      $title=$attractions->attraction_title;
         $PostcategoryImage = title::where('title', $id)
          ->first();
  // dd($attractions);
        return view('website.attractions.attractionSummary',compact('attractions','PostcategoryImage','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attraction  $attraction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attraction $attraction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attraction  $attraction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $delete = attraction::where('id',$id)->first();
        if($delete->delete()){
         return redirect()->back()->with('success','Attraction'." ".$delete->accommodation_name." ".$delete->category.' removed successfully');
        }    
        else{
            return redirect()->back()->with('error','Attraction'." ".$delete->attraction_title." ". $delete->attraction_title.' not exists');
        }
    }
}

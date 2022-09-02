<?php

namespace App\Http\Controllers;

use App\Models\attachment;
use App\Models\destination;
use App\Models\location;
use Illuminate\Http\Request;

class destinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $datas = destination::leftjoin('locations','locations.id','destinations.location_id')
        ->select('destinations.*','locations.location_name')
        ->get();       
        return view('admins.destinations.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations=location::get();
        return view('admins.destinations.add',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              
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
                 $path = $attached->storeAs('public/destination/', $imageToStore);


          $destinate = destination::create(
           [
            'destination_name'=>request('destination_name'),
            'category'=>request('category'),
            'popularity'=>request('popularity'),
            'destination_description'=>request('destination_description'),
            'seo'=>request('seo'),
             'photo'=>$imageToStore,
             'location_id'=>request('location_id'),
            'user_id'=>auth()->id()
           ]);
       
    }
}
else
{
   return redirect()->back()->with('info','No Image Uploaded.!');
}
        return redirect()->back()->with('success','Destination created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destinations = destination::where('id',$id)->get();
               $attachments = attachment::where('destination_id',$id)->where('type','Destination')->get();
        return view('admins.destinations.show',compact('destinations','attachments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $locations=location::get();
         $destinations = destination::where('id',$id)->get();
        $attachments = attachment::where('destination_id',$id)->where('type','Destination')->get();
        $datas = destination::where('id',$id)->first();
          $location_name = location::where('id',$datas->location_id)->first();
          
        return view('admins.destinations.editDestination',compact('datas','destinations','attachments','locations','location_name','id'));
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
        if($id!=null)
        {

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
                 $path = $attached->storeAs('public/destination/', $imageToStore);


          $location = destination::where('id',$id)
               ->update([
         'destination_name'=>request('destination_name'),
            'category'=>request('category'),
            'popularity'=>request('popularity'),
            'destination_description'=>request('destination_description'),
            'seo'=>request('seo'),
             'photo'=>$imageToStore,
             'location_id'=>request('location_id'),
            'user_id'=>auth()->id()
              ]);
      
      }
       
    
}
else
{
     $location = destination::where('id',$id)
               ->update([
         'destination_name'=>request('destination_name'),
            'category'=>request('category'),
            'popularity'=>request('popularity'),
            'destination_description'=>request('destination_description'),
            'seo'=>request('seo'),
             'location_id'=>request('location_id'),
            'user_id'=>auth()->id()
              ]);
}

        }
        else
        {
          return redirect()->back()->with('info','No ID Provided!');  
        }

           return redirect()->route('destinations.index')->with('success','Location Updated successful');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $delete = destination::where('id',$id)->first();
        if($delete->delete()){
         return redirect()->back()->with('success','Agent'." ".$delete->destination_name." ".$delete->category.' removed successfully');
        }    
        else{
            return redirect()->back()->with('error','Agent'." ".$delete->destination_name." ". $delete->category.' not exists');
        }
    }
}

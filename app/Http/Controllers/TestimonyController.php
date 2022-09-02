<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use App\Models\departures;
use App\Models\program;
use App\Models\attachment;

use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Testimony::join('attachments','attachments.destination_id','testimonies.id')
        ->select('testimonies.*','attachments.attachment')
        ->where('attachments.type','testimonies')
       ->get();   
        return view('admins.Testimonies.testimonies',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        return view('admins.Testimonies.addTestimony');
      }  
   
  //Comments from client
   public function clientComment()
     {      
        return view('website.testimonies.testimonyForm');
     }  
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   $status=request('status');
   if ($status==null || $status==0)
   {
  $status=0;
   }
   else
   {
     $status=1;
   }

       $client=request('client');

        $testimonies = Testimony::create([
        'full_name'=>request('full_name'),
        'comments'=>request('comments'),
        'rating'=>request('rank'),
        'status'=>$status,
        'user_id'=>auth()->id()
        ]);
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
                 $path = $attached->storeAs('public/uploads/', $imageToStore);

            attachment::create(
                [
                'destination_id'=>$testimonies->id,
                'attachment'=>$imageToStore,
                'type'=>'Testimonies'
                ]
                );
            }
        }
        if ($client=='Client')
        {
       return redirect('/')->with('success','Accommodation created successful');
         }
        else {
          return redirect()->back()->with('success','Accommodation created successful');
        }
    }


 public function store2(Request $request)
    {
        $testimonies = Testimony::create([
        'full_name'=>request('full_name'),
        'comments'=>request('comments'),
        'rating'=>request('rank'),
        'status'=>0,
        'user_id'=>auth()->id()
        ]);
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
                 $path = $attached->storeAs('public/uploads/', $imageToStore);

            attachment::create(
                [
                'destination_id'=>$testimonies->id,
                'attachment'=>$imageToStore,
                'type'=>'Testimonies'
                ]
                );
            }
        }
        return redirect()->route('/')->with('success','Accommodation created successful');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show(Testimony $testimony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {         
        $datas = Testimony::where('id',$id)->first();
        return view('admins.Testimonies.editTestimony',compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {         
         $attachmentID = attachment::where('destination_id',$id)
         ->where('Type','Testimonies')->first();
         //dd($attachmentID->id);
  
       if($id !=null)
         {
       
        $Update = testimony::where('id',$id)           
        ->update([
        'full_name'=>request('full_name'),
        'comments'=>request('comments'),
        'rating'=>request('rank'),
        'status'=>request('status'),
        'user_id'=>auth()->id()
         ]);

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
                 $path = $attached->storeAs('public/uploads/', $imageToStore);
        //dd($attachmentID->id);
        $testimonyUpdate = attachment::where('id',$attachmentID->id) 
        ->where('Type','Testimonies')          
        ->update([
        'attachment'=>$imageToStore
         ]);
         }
        }
     return redirect()->route('Testimonies.index')->with('success','Updated successfully');
        }
        return redirect()->back()->with('error','Not Updated');
    } 
        
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
   

       public function destroy($id)
    {
        $delete = Testimony::where('id',$id)->first();
        if($delete->delete()){
            return redirect()->back()->with('success','Testimony Deleted successful');
            
        }    
        else{
            return redirect()->back()->with('error','Testimony not exists');
        }
    }
}

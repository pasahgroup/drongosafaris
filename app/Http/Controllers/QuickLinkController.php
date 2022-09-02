<?php

namespace App\Http\Controllers;

use App\Models\quickLink;
use App\Models\Post;
use Illuminate\Http\Request;

class QuickLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

   $datas = quickLink::get();
        return view('admins.quickLinks.quickLink',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // return view('admins.quickLinks.addQuickLink');
       $pageTypes= Post::get();
       return view('admins.quickLinks.addQuickLink',compact('pageTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request('url'));
             $program =  quickLink::Create(
            [  
               'page_type'=>request('page_type'),
             'quick_title'=>request('quick_title'),
                'quick_description'=>request('quick_description'),
                'url'=>request('url'),
                'slider'=>request('slider'),
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
                     $path = $attached->storeAs('public/uploads/', $imageToStore);

                quickLink::UpdateOrCreate(
               [ 'quick_title'=>request('quick_title')],
                [              
                'attachment'=>$imageToStore              
                ]
                );       
         
        }
      }

        return redirect()->route('quickLink.index')->with('success','Created successfuly');
    }


 public function EditQuickLink($id)
    {        
   $pageTypes= Post::get();
      $quickLinks = quickLink::where('id',$id)
         ->get()->first();         
        return view('admins.quickLinks.editQuickLink',compact('quickLinks','pageTypes'));  
    }

     public function QuickLinkSummary($id)
    {
       // dd($id);
      $quickLinks = quickLink::where('id',$id)
         ->get()->first();      
        return view('website.quickLinks.quickLinkSummary',compact('quickLinks')); 
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quickLink  $quickLink
     * @return \Illuminate\Http\Response
     */
    public function show(quickLink $quickLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quickLink  $quickLink
     * @return \Illuminate\Http\Response
     */
    public function edit(quickLink $quickLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quickLink  $quickLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $toupdate = quickLink::where('id',$id)->update([
        
             'page_type'=>request('page_type'),
            'quick_title'=>request('quick_title'),
            'quick_description'=>request('quick_description'),
            'url'=>request('url'),
            'slider'=>request('slider'),
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
                         $path = $attached->storeAs('public/uploads/', $imageToStore);
    
                  quickLink::UpdateOrCreate(
                   [ 'quick_title'=>request('quick_title')],
                   [              
                    'attachment'=>$imageToStore              
                    ]);       
             
            }
          }
    
            return redirect()->route('quickLink.index')->with('success','Created successfuly'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quickLink  $quickLink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = quickLink::where('id',$id)->first();
        if($delete->delete()){
         return redirect()->back()->with('success','"$delete->quick_title"'.' removed successfully');
        }    
        else{
            return redirect()->back()->with('error','"$delete->quick_title"'.' not exists');
       
        }
    }
}

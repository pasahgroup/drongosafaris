<?php

namespace App\Http\Controllers;

use App\Models\title;
use App\Models\attachment;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $titles = title::get();
         return view('admins.titles.titles',compact('titles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $titles = title::get();
        return view('admins.titles.addTitle',compact('titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $program =  title::UpdateOrCreate(
            ['title'=> request('title')],               
               
             [
              'body'=>request('post_body'),  
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

         
                 $title=title::UpdateOrCreate(
                 ['title'=> request('title')], 
                [               
                'body'=>request('post_body'),              
                'attachment'=>$imageToStore,
                'user_id'=>auth()->id()
                ]
                );               
        
         }

     }
         return redirect()->route('titles.index')->with('success','Created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //dd($id);
        $titles = title::where('id',$id)
        ->get()->first();
        //dd($titles);
        return view('admins.titles.editTitle',compact('titles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, title $title)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = title::where('id',$id);
        if($delete->delete()){
            return redirect()->back()->with('success','Title removed successfully');
        }    
        else{
            return redirect()->back()->with('error','This Data is not exists');
        }
    }
}

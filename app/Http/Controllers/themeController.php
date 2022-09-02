<?php

namespace App\Http\Controllers;

use App\Models\slider;
use App\Models\program;
use Illuminate\Http\Request;

class themeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$sliders = slider::get();
         $sliders = slider::join('programs','programs.id','sliders.tour_id')
          ->select('sliders.*','programs.tour_name')
          ->get();
        $tours = program::get();
        return view('admins.themes.slider',compact('sliders','tours'));
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
        //
        if(request('attachment')){
            //dd('d1');
            // Get filename with extension
            $fileNameWithExt = request('attachment')->getClientOriginalName();
            // Just Filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
              //$filename = strtok($filename, " ");
            // Get just Extension
            $extension = request('attachment')->getClientOriginalExtension();
            //Filename to store
            $filename = strtok($filename, " ");
            $imageToStore = $filename.'_'.time().'.'.$extension;
            //upload the image
            $path = request('attachment')->storeAs('public/uploads/', $imageToStore);

            $slider = slider::UpdateOrCreate(
                [ 'tour_id'=>request('tour_id')],
                ['title'=>request('title'),
                'status'=>request('status'),
                    'description'=>request('description'),                   
                    'attachment'=>$imageToStore
                ]);                
                return redirect()->back()->with('success','Slider created succesfully');
       }
       else
       {
//dd('d2');
             $slider = slider::UpdateOrCreate(
                [ 'tour_id'=>request('tour_id')],
                ['title'=>request('title'),
                'status'=>request('status'),
                    'description'=>request('description')                   
                    //'attachment'=>$imageToStore
                ]);               
                return redirect()->route('themes.index')->with('success','Slider created succesfully');
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     //dd($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $slides=slider::where('id',$id)->get()->first();

        $tours = program::get();
        $sliders = slider::join('programs','programs.id','sliders.tour_id')
          ->where('sliders.tour_id',$slides->tour_id)
          ->get()->first();
        
        return view('admins.themes.edit',compact('sliders','tours'));   
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
        $delete = slider::where('id',$id)->first();
        if($delete->delete()){
            return redirect()->back()->with('success','Widget removed successfully');
        }    
        else{
            return redirect()->back()->with('error','Widget not exists');
        }
    }
}

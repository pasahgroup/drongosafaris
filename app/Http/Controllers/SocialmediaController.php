<?php

namespace App\Http\Controllers;

use App\Models\socialmedia;
//use App\Models\Tourcostsummary;
//use App\Models\accommodation;
//use App\Models\attachment;
//use App\Models\program;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $social = socialmedia::get();
       return view('admins.socialMedia.socialmedia',compact('social'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $socialmedia=socialmedia::get();
     return view('admins.socialMedia.addSocial',compact('socialmedia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tourcostsummary = socialmedia::create([
        'social_name'=>request('social_name')
            ]);
        return redirect()->back()->with('success','Social name Cost created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $id=$id;
        $socialmedia=socialmedia::where('id',$id)->first();
       return view('admins.socialMedia.editSocial',compact('socialmedia','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function edit(socialmedia $socialmedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //dd($id);
         $program = socialmedia::where('id',$id)
               ->update([
             'social_name'=>request('social_name')
              ]);
                return redirect()->route('socialMedia.index')->with('success','Social name Cost created successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = socialmedia::where('id',$id)->first();
        if($delete->delete()){
         return redirect()->back()->with('success','"$delete->social_name"'.' removed successfully');
        }    
        else{
            return redirect()->back()->with('error','"$delete->social_name"'.' not exists');
       
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;

class locationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = location::get();
        return view('admins.locations.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.locations.add');
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
        location::create(
            [
        'location_name'=>request('location_name'),
        'country'=>request('country'),
        'region'=>request('region'),
        'district'=>request('district'),
        'ward_town'=>request('ward_town'),
        'lat'=>request('lat'),
        'long'=>request('long'),
        'user_id'=>auth()->id()
            ]
        );
        return redirect()->back()->with('success','Location created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = location::where('id',$id)->first();
        return view('admins.locations.editLocation',compact('datas','id'));
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
        
        $location = location::where('id',$id)
               ->update([
        'location_name'=>request('location_name'),
        'country'=>request('country'),
        'region'=>request('region'),
        'district'=>request('district'),
        'ward_town'=>request('ward_town'),
        'lat'=>request('lat'),
        'long'=>request('long'),
        'user_id'=>auth()->id()

              ]);
                return redirect()->route('locations.index')->with('success','Location Updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $delete = location::where('id',$id)->first();
        if($delete->delete()){
         return redirect()->back()->with('success','Agent'." ".$delete->country." ".$delete->location_name.' removed successfully');
        }    
        else{
            return redirect()->back()->with('error','Agent'." ".$delete->country." ". $delete->location_name.' not exists');
        }
    }
}

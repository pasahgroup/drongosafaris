<?php

namespace App\Http\Controllers;

use App\Models\accommodation;
use App\Models\attachment;
use App\Models\destination;
use App\Models\itinerary;
use App\Models\program;
use App\Models\addons;
use Illuminate\Http\Request;

class AddonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = addons::get();
        return view('admins.addons.addon',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.addons.add');
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
       $addon =  addons::create(
            [
                'addon_name'=>request('addon_name'),
                'days'=>request('days'),
                'price'=>request('price'),
                'srsprice'=>request('srsprice'),
                'currency'=>request('currency'),
                'category'=>request('category'),
                'type'=>request('type'),
                'style'=>request('style'),
                'overview'=>request('overview'),
                'addon_highlight'=>request('addon_highlight'),
                'physical_rating'=>request('physical_rating'),
                'seo'=>request('seo'),
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
                'destination_id'=>$addon->id,
                'attachment'=>$imageToStore,
                'type'=>'addon'
                ]
                );
        }
    }
        return redirect()->back()->with('success','Created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\addons  $addons
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $tour_addon='addon';     
          $programs = addons::join('itineraries','itineraries.program_id','addons.id')
        ->where('addons.id',$id)->first();
        $datas = itinerary::join('itinerary_days','itineraries.id','itinerary_days.itinerary_id')
        ->join('accommodations','accommodations.id','itinerary_days.accommodation_id')
        ->join('destinations','destinations.id','itinerary_days.destination_id')
        ->join('addons','addons.id','itineraries.program_id')
        ->orderby('itinerary_days.id','ASC')
         ->where('itineraries.tour_addon','addon')
        ->where('itineraries.program_id',$id)
        ->select('accommodations.accommodation_name','destinations.destination_name','itineraries.*','addons.addon_name','itinerary_days.*')
        ->get();

         if($datas == "[]"){
            $programs = addons::where('id',$id)->first();
            $accommodations = accommodation::get();
            $destinations = destination::get();
            return view('admins.itinerary.add',compact('programs','accommodations','destinations','tour_addon'));

        };
        return view('admins.Itinerary.addon',compact('datas','id','programs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\addons  $addons
     * @return \Illuminate\Http\Response
     */
    public function edit(addons $addons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\addons  $addons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addons $addons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\addons  $addons
     * @return \Illuminate\Http\Response
     */
    public function destroy(addons $addons)
    {
        //
    }
}

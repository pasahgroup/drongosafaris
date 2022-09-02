<?php

namespace App\Http\Controllers;

use App\Models\addons;
use App\Models\buyaddons;
use App\Models\socialmedia;
use Illuminate\Http\Request;

class BuyaddonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $addons = addons::get();
      //dd($socialmedia);
      return view('website.buyaddons.buyaddonsForm',compact('addons'));
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
         $hear_from = request('hear');
         $id=request('program_id');

        foreach ($hear_from as $hears) {
        $tourhearfrom = buyaddons::create([
        'program_id'=>request('program_id'),
        'addon_name'=>$hears        
        ]);
        }    
        
        return redirect()->route('grouptour.show',$id)->with('success','Tour Summary Cost created successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buyaddons  $buyaddons
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $addons = addons::get();     
      return view('website.buyaddons.buyaddonsForm',compact('addons','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buyaddons  $buyaddons
     * @return \Illuminate\Http\Response
     */
    public function edit(buyaddons $buyaddons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\buyaddons  $buyaddons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, buyaddons $buyaddons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buyaddons  $buyaddons
     * @return \Illuminate\Http\Response
     */
    public function destroy(buyaddons $buyaddons)
    {
        //
    }
}

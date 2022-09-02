<?php

namespace App\Http\Controllers;

use App\Models\Tourcostsummary;
use App\Models\accommodation;
use App\Models\attachment;
use App\Models\program;
use Illuminate\Http\Request;

class TourcostsummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $basic = Tourcostsummary::
       where('status','Basic')
       ->get();
        $comfort = Tourcostsummary::
       where('status','Comfort')
       ->get();
        $luxury = Tourcostsummary::
       where('status','Deluxe')
       ->get();

        return view('admins.tour.tourcost',compact('basic','comfort','luxury'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $programs=program::get();
     return view('admins.tour.add',compact('programs'));
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
        $tourcostsummary = Tourcostsummary::UpdateOrCreate(
        ['program'=>request('program'),
        'season'=>request('season'),
        'status' => request('status')],
        
        [       
        'twopax'=>request('twopax'),
        'threepax'=>request('threepax'),
        'fourpax'=>request('fourpax'),
        'fivepax'=>request('fivepax'),
        'sixpax'=>request('sixpax'),
         'srs'=>request('srs'),
         'currency'=>request('currency'),
        'user_id'=>auth()->id()
        ]);
        return redirect()->back()->with('success','Tour Summary Cost created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tourcostsummary  $tourcostsummary
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $tourcostsummaries=tourcostsummary::where('id',$id)
       ->first();
        $programs=program::get();
       //dd($programs);
     return view('admins.tour.addEdit',compact('tourcostsummaries','programs')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tourcostsummary  $tourcostsummary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
       $tourcostsummaries=tourcostsummary::where('id',$id)
       ->first();
        $programs=program::get();
       //dd($programs);
     return view('admins.tour.addEdit',compact('tourcostsummaries','programs')); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tourcostsummary  $tourcostsummary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $toUpdate = tourcostsummary::where('id',request('id'))
               ->update([
        'program'=>request('program'),
        'season'=>request('season'),
        'status' => request('status'),
        'twopax'=>request('twopax'),
        'threepax'=>request('threepax'),
        'fourpax'=>request('fourpax'),
        'fivepax'=>request('fivepax'),
        'sixpax'=>request('sixpax'),
         'srs'=>request('srs'),
         'currency'=>request('currency'),
        'user_id'=>auth()->id()

        ]);
    return redirect()->route('tourcostsummary.index')->with('success','Cost Summary successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tourcostsummary  $tourcostsummary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $delete = tourcostsummary::where('id',$id)->first();
        if($delete->delete()){
            return redirect()->back()->with('success','Widget removed successfully');
        }    
        else{
            return redirect()->back()->with('error','Widget not exists');
        }
    }
   }

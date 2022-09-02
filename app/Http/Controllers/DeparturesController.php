<?php

namespace App\Http\Controllers;

use App\Models\departures;
use App\Models\popularExperience;
use App\Models\program;
use App\Models\specialOffer;
use Illuminate\Http\Request;

class DeparturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $datas = departures::join('programs','programs.id','departures.tour_id')
        ->select('departures.id','departures.*','programs.tour_name','programs.days','programs.category','programs.type','programs.price','programs.id as program_id')
            ->get();

         $tours = program::join('attachments','attachments.destination_id','programs.id')
        ->select('programs.*','attachments.attachment')
        ->where('attachments.type','Programs')
        ->where('programs.category','Group')
        ->get();       
        
        return view('admins.Sales.departures.departure',compact('datas','tours'));
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
      $id=request('tour_id');
      $datasf = program::where('id',$id)->get();
      foreach ($datasf as $key => $value) {

      }

     $start_date=request('start_date');
     $end_date=date('Y-m-d', strtotime($start_date. ' + '.$value->days.' days'));

       $offers=specialOffer::where('status','Active')
      ->where('tour_id',request('tour_id'))->first();
     // dd($offers->tour_id);

       if($offers!=null)
       {
             $value=1;
             $offer_date=date('Y-m-d', strtotime($start_date. ' - '.$value.' days'));
            $toupdate = specialOffer::where('tour_id',$id)->update([
                    'offer_deadline'=> $offer_date
        ]);
       }
   
          $departures = departures::UpdateorCreate(

                ['tour_id'=>request('tour_id'),
               'start_date'=>request('start_date')
            ],
                ['group_tour_category'=>request('tour_category'),
                'price'=>request('price'),
                 'srs'=>request('srs'),
                'seats'=>request('seats'),               
                'end_date'=>$end_date,
                'status'=>'Active',
                'user_id'=>auth()->id()
            ]
            );

     return redirect()->back()->with('success','departure created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\departures  $departures
     * @return \Illuminate\Http\Response
     */
    public function show(departures $departures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\departures  $departures
     * @return \Illuminate\Http\Response
     */
    public function edit(departures $departures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\departures  $departures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, departures $departures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\departures  $departures
     * @return \Illuminate\Http\Response
     */
    public function destroy(departures $departures)
    {
        //
    }
}

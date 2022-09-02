<?php

namespace App\Http\Controllers;

use App\Models\grouptour;
use App\Models\Tour;
use App\Models\addons;
use App\Models\accommodation;
use App\Models\attachment;
use App\Models\destination;
use App\Models\itinerary;
use App\Models\program;
use App\Models\popularExperience;
use App\Models\specialOffer;
use App\Models\slider;

use App\Models\Tourcostsummary;
use App\Models\departures;
use App\Models\buyaddons;
use App\Models\title;
use App\Models\accommodationInclusive;
use DB;
use Illuminate\Http\Request;

class GrouptourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $programs = departures::join('programs','programs.id','departures.tour_id')
        ->join('attachments','attachments.destination_id','programs.id')
        ->select('departures.*','programs.*','attachments.attachment')
        ->where('departures.status','Active')
        ->where('attachments.type','Programs')
        ->get();

   $PostcategoryImage = title::where('title','Scheduled Group Tours')
          ->first();
        return view('website.grouptour.grouptour',compact('programs','PostcategoryImage'));
    }

 public function GS()
    {
         $tour_category='Scheduled Group Tours';

         $programs = departures::join('programs','departures.tour_id','programs.id')
       ->join('attachments','attachments.destination_id','programs.id')
        ->select('departures.*','programs.*','attachments.attachment')
        ->where('departures.status','Active')
        ->where('departures.group_tour_category','GS')
        ->where('attachments.type','Programs')
        ->groupby('departures.group_tour_category')
         ->groupby('departures.tour_id')
        ->get();

    $PostcategoryImage = title::where('title','Scheduled Group Tours')
          ->first();
         // dd($PostcategoryImage);
           return view('website.grouptour.grouptour',compact('programs','tour_category','PostcategoryImage'));
    }

     public function SO()
    {
        $tour_category='Special Ocassions';
        $PostcategoryImage = title::where('title','Scheduled Group Tours')
          ->first();

         $programs = departures::join('programs','programs.id','departures.tour_id')
        ->join('attachments','attachments.destination_id','programs.id')
        ->select('departures.*','programs.*','attachments.attachment')
        ->where('departures.status','Active')
        ->where('departures.group_tour_category','SO')
        ->where('attachments.type','Programs')
         ->groupby('departures.group_tour_category')
         ->groupby('departures.tour_id')
        ->get();

      $PostcategoryImage = title::where('title','Special Occasions')
          ->first();

           return view('website.grouptour.grouptour',compact('programs','tour_category','PostcategoryImage'));
    }
     public function UN()
    {
        $tour_category='Utalii Nyumbani';
        $PostcategoryImage = title::where('title','Scheduled Group Tours')
          ->first();

         $programs = departures::join('programs','programs.id','departures.tour_id')
        ->join('attachments','attachments.destination_id','programs.id')
        ->select('departures.*','programs.*','attachments.attachment')
        ->where('departures.status','Active')
        ->where('departures.group_tour_category','UN')
        ->where('attachments.type','Programs')
         ->groupby('departures.group_tour_category')
         ->groupby('departures.tour_id')
        ->get();

          $PostcategoryImage = title::where('title','Utalii Nyumbani')
          ->first();
           return view('website.grouptour.grouptour',compact('programs','tour_category','PostcategoryImage'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\grouptour  $grouptour
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
          $discounts=specialOffer::where('tour_id',$id)->first();

          $tour_addon='Programs';
           $programs = program::
           join('itineraries','itineraries.program_id','programs.id')
           ->join('attachments','attachments.destination_id','programs.id')
            ->where('attachments.type','Programs')
           ->where('itineraries.tour_addon','programs')
           ->where('programs.id',$id)

           ->select('programs.*','attachments.attachment','itineraries.*')
          ->get()->first();
     
           if($programs ==null){
              $programs = program::
              where('programs.id',$id)->first();                         }

          $datas = itinerary::join('itinerary_days','itineraries.id','itinerary_days.itinerary_id')
            
        ->join('accommodations','accommodations.id','itinerary_days.accommodation_id')
 
         ->join('destinations','destinations.id','itinerary_days.destination_id')
         ->join('programs','programs.id','itineraries.program_id')


          ->join('locations','destinations.location_id','locations.id')
         ->join('attachments','attachments.destination_id','accommodations.id')
         ->orderby('itinerary_days.id','ASC')
         ->where('itineraries.tour_addon','programs')
          ->where('attachments.type','Accommodation')
         //->get();
         
         ->where('itineraries.program_id',$id)
         
        
         ->select('accommodations.*','accommodations.type',
         'itineraries.*','destinations.*','locations.*','programs.tour_name','itinerary_days.*','attachments.attachment')
         ->get();
    
         if($datas == "[]"){
            $programs = program::
            join('attachments','attachments.destination_id','programs.id')
           ->where('attachments.type','Programs')
            ->where('programs.id',$id)->first();
           // dd($programs);

            $accommodations = accommodation::get();
            $destinations = destination::get();
            return view('admins.Itinerary.add',compact('programs','accommodations','destinations','tour_addon'));
             };

      $get_type = program::whereid($id)->first();
        $type = $get_type->type;
       $addons = addons::join('attachments','addons.id','attachments.destination_id')
        ->select('addons.*','attachments.attachment')
        ->where('addons.type','!=',$type)
        ->where('attachments.type','addon')
        ->latest()->limit(3)->get();

    //Update seats
    DB::statement("UPDATE departures d,tour_equiry_forms t SET d.booked=(select sum(tt.adults + tt.teens)bookedf from tour_equiry_forms tt where tt.tour_id=$id and tt.status='Active' and d.id=tt.depart_id ) where d.tour_id=$id and d.id=t.depart_id");

    $basic=DB::select("select d.tour_id,d.group_tour_category,d.price,d.srs,(d.seats-d.booked)seats,p.currency,d.start_date,d.end_date  from departures d,programs p,attachments a where p.id=d.tour_id and a.destination_id=p.id and d.status='Active' and a.type='Programs' and d.tour_id=$id group by d.start_date");
  //  dd($basic);
         $basicCount=DB::select("select * from(select count(d.start_date)date_count,DATE_FORMAT(d.start_date,'%m-%Y')datef from departures d,programs p,attachments a where d.tour_id=p.id and a.destination_id=p.id and d.status='Active' and a.type='Programs' and d.tour_id=$id group by datef)as tmp_table order by DATE_FORMAT(datef,'%m-%Y')");

  //Tour Departure date
  // $departureDate=departures::where('tour_id',$id)
  //   ->where('seats','>','booked')
  //  ->orderBy('start_date')
  // ->get();

   $departureDate=DB::select("select * from departures where tour_id=$id and seats>booked order by start_date");
  //dd($departureDate);

//Accommodation Inclusive
          $inclusives=DB::select("select id,inclusive from inclusives  where id not in(select (inclusive_id)id from accommodation_inclusives where tour_id =$id)");

           $assignLists = accommodationInclusive::join('inclusives','accommodation_inclusives.inclusive_id','inclusives.id')
        ->where('accommodation_inclusives.tour_id',$id)->get();
 //End of accommodation Inclusive  
    
      $buyaddons= buyaddons::join('programs','programs.id','buyaddons.program_id')
          ->where('buyaddons.program_id',$id)
         ->get();

        return view('website.grouptour.grouptourSummary',compact('datas','id','programs','basic','basicCount','addons','buyaddons','discounts','departureDate','inclusives','assignLists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\grouptour  $grouptour
     * @return \Illuminate\Http\Response
     */
    public function edit(grouptour $grouptour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\grouptour  $grouptour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, grouptour $grouptour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\grouptour  $grouptour
     * @return \Illuminate\Http\Response
     */
    public function destroy(grouptour $grouptour)
    {
        //
    }
}

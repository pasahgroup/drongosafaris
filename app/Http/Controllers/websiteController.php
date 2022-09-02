<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use App\Models\destination;
use App\Models\popularExperience;
use App\Models\slider;
use App\Models\specialOffer;
use App\Models\departures;
use App\Models\program;
use App\Models\PostBody;
use App\Models\title;
use App\Models\quickLink;
use App\Models\attraction;
use DB;

use Illuminate\Http\Request;

class websiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//Code to check Status
   $start_date=Now();
   $_date=date('Y-m-d', strtotime($start_date));
//Update status of special_offers table
   $special_date = specialOffer::where('status','Active')
          ->where('offer_deadline','<',$_date)
           ->update([
            'status'=>'Inactive'
        ]);

           //Update status of departures table
          $departure_date = departures::where('status','Active')
          ->where('end_date','<',$_date)
           ->update([
            'status'=>'Inactive'
        ]);
       //End of Code to check Status

        $offers='offers';
        $offers_private = specialOffer::join('programs','programs.id','special_offers.tour_id')
        ->join('attachments','attachments.destination_id','programs.id')
        ->select('special_offers.id','special_offers.*','programs.tour_name','programs.days','programs.category','programs.type','programs.tour_code',
        'programs.price','programs.id as program_id','programs.physical_rating','attachments.attachment')
        ->where('special_offers.status','Active')
         ->where('programs.category','Private')
        ->where('attachments.type','Programs')
        ->groupby('attachments.destination_id')
        ->limit(3)->latest()->get();
  

        $offers_group = specialOffer::join('programs','programs.id','special_offers.tour_id')
        ->join('attachments','attachments.destination_id','programs.id')
        ->join('departures','departures.tour_id','programs.id')
        ->select('special_offers.id','special_offers.*','departures.start_date','departures.end_date','programs.tour_name','programs.tour_code','programs.days','programs.category','programs.type',
        'programs.price','programs.id as program_id','programs.physical_rating','attachments.attachment')
       ->where('special_offers.status','Active')
       ->where('departures.status','Active')
       ->where('programs.category','Group')
        ->where('attachments.type','Programs')
        ->groupby('attachments.destination_id')
        ->limit(3)->latest()->get();
  
  $popular_safari = program::
  join('attachments','attachments.destination_id','programs.id')
 
  ->select('programs.*','attachments.attachment')
  //->orwhere('programs.type','Wildlife Safaris')
 // ->orwhere('programs.type','Combined Tours')
   //->orwhere('programs.type','Day Tours')
  ->whereIn('programs.type',array('Wildlife Safaris'))
  ->where('programs.popular_experience','Yes')
  ->where('attachments.type','Programs')
  ->limit(1)->first();

   //dd($popular_safari->id);
    $popular_safarif = program::
  join('attachments','attachments.destination_id','programs.id')
  ->select('programs.*','attachments.attachment')
  //->orwhere('programs.type','Wildlife Safaris')
  //->orwhere('programs.type','Combined Tours')
  //->orwhere('programs.type','Day Tours')
   ->whereIn('programs.type',array('Day Tours','Combined Tours','Wildlife Safaris'))
   ->whereNotIn('programs.id',array($popular_safari->id))
  // ->where('programs.popular_experience','Yes')
  ->where('attachments.type','Programs')
  ->offset(1)->limit(8)->get();
  //dd($popular_safarif);

   $popular_trekking = program::join('attachments','attachments.destination_id','programs.id')
 ->select('programs.*','attachments.attachment')
  ->where('programs.type','Hiking & Trekking')
 ->where('programs.popular_experience','Yes')
  ->where('attachments.type','Programs')
  ->limit(1)->get()->first();

  $popular_trekkingf = program::join('attachments','attachments.destination_id','programs.id')
 ->select('programs.*','attachments.attachment')
  ->where('programs.type','Hiking & Trekking')
  //->where('programs.popular_experience','Yes')
  ->where('attachments.type','Programs')
   ->offset(1)->limit(8)->get();

 $popular_holiday = program::join('attachments','attachments.destination_id','programs.id')
 ->select('programs.*','attachments.attachment')
  ->where('programs.type','Beach Holidays')
 ->where('programs.popular_experience','Yes')
  ->where('attachments.type','Programs')
  ->limit(1)->first();
  
   $popular_historical = program::join('attachments','attachments.destination_id','programs.id')
 ->select('programs.*','attachments.attachment')
  ->where('programs.type','Historical Site')
 ->where('programs.popular_experience','Yes')
  ->where('attachments.type','Programs')
  ->limit(1)->first();
//dd($popular_historical);

 $popular_historicalf = program::join('attachments','attachments.destination_id','programs.id')
 ->select('programs.*','attachments.attachment')
  ->where('programs.type','Historical Site')
 //->where('programs.popular_experience','Yes')
  ->where('attachments.type','Programs')
  ->offset(1)->limit(4)->get();

 $popular_holidayf = program::join('attachments','attachments.destination_id','programs.id')
 ->select('programs.*','attachments.attachment')
  ->where('programs.type','Beach Holidays')
 //->where('programs.popular_experience','Yes')
  ->where('attachments.type','Programs')
  ->offset(1)->limit(8)->get();

    $scheduledGroupTours = departures::join('programs','departures.tour_id','programs.id')
       ->join('attachments','attachments.destination_id','programs.id')
        ->select('departures.*','programs.*','attachments.attachment')
        ->where('departures.status','Active')
        ->where('departures.group_tour_category','GS')
        ->where('attachments.type','Programs')
        ->groupBy('departures.group_tour_category')
        ->get();

         $place_to_visit = program::join('attachments','programs.id','attachments.destination_id')
         ->join('itineraries','programs.id','itineraries.program_id')
         ->select('programs.*','attachments.attachment')
          ->where('attachments.type','Programs')
          ->where('programs.popular_experience','Yes')
           ->where('programs.category','Private')
          ->where('itineraries.tour_addon','Programs')
          ->limit(6)->latest()->get();
  
         //Slider part         
          $slidersf = slider::join('programs','programs.id','sliders.tour_id')
          ->where('sliders.status','1')
          ->select('sliders.*','programs.tour_name')
          ->limit(1)->first();

           $sliders = slider::join('programs','programs.id','sliders.tour_id')
          ->where('sliders.status','1')
          ->select('sliders.*','programs.tour_name')
          ->offset(1)->limit(5)->get();
        //  $slidersCount=DB::select('select count(title) title from sliders');
        // $slidersCount=slider::where('status','1')
        // ->count();
           $slidersCount = slider::join('programs','programs.id','sliders.tour_id')
           ->where('sliders.status','1')
          ->count();
         $quickLinkSliderCount=quicklink::where('slider','Yes')
         ->count();
         $quickLinkSliders = quicklink::where('slider','Yes')         
         ->get();
         $slidersCount= $slidersCount + $quickLinkSliderCount;
        //dd($quickLinkSliders);
        //End of Slider part


          // $welcome_message = PostBody::join('attachments','post_bodies.id','attachments.destination_id')
          //   //->select('post_bodies.*','attachments.attachment')
          //  ->where('attachments.type','Posts')
          // ->limit(1)->get();

           $welcome_message = quickLink::where('page_type','Welcome message')
              ->limit(1)->get();
     
         $testimonies_one = Testimony::join('attachments','attachments.destination_id','testimonies.id')
        ->select('testimonies.*','attachments.attachment')
        ->where('attachments.type','Testimonies')
        ->where('testimonies.status','1')
        ->limit(1)->latest()->first();

         $testimonies = Testimony::join('attachments','attachments.destination_id','testimonies.id')
        ->select('testimonies.*','attachments.attachment')
        ->where('attachments.type','Testimonies')
        ->where('testimonies.status','1')
        ->offset(1)->limit(8)->latest()->get();
    
       
     //Seach Engine
       // $seo = title::where('title','What We Offer')->first();
       $title = "Drongo Safaris Tour Tanzania";
       $description = "";
       $keywords = "";


       $datasLink = quickLink::where('page_type','Quick link')
   ->limit(9)->get();
   //dd($datasLink);
    $contacts = PostBody::where('category','Contact')
       ->first();

   $historical_first=attraction::where('type','Historical')
         ->limit(1)->get()->first();
          $historical=attraction::where('type','Historical')
          ->offset(1)->limit(8)->get();

            $wildlife_first=attraction::where('type','Wildlife')
         ->limit(1)->get()->first();
          $wildlife=attraction::where('type','Wildlife')
          ->offset(1)->limit(8)->get();

          $geographical_first=attraction::where('type','Geographical')
         ->limit(1)->get()->first();
          $geographical=attraction::where('type','Geographical')
          ->offset(1)->limit(8)->get();

        $culture_first=attraction::where('type','Culture & Belief')
         ->limit(1)->get()->first();
          $culture=attraction::where('type','Culture & Belief')
          ->offset(1)->limit(8)->get();

         return view('website.home.index',compact('offers_private','offers_group','popular_safari','popular_safarif','popular_trekkingf','popular_holiday','popular_trekking','popular_holidayf','popular_historical','popular_historicalf','place_to_visit','sliders','slidersf','slidersCount','testimonies','offers','welcome_message','scheduledGroupTours','datasLink','title','description','keywords','contacts','testimonies_one','quickLinkSliders','historical_first','historical','geographical_first','geographical','culture_first','culture','wildlife_first','wildlife'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Fction to read the tours according the circuit zone
    public function circuitTour($circuit_name)
    {
 $circuitTour = program::
  join('attachments','attachments.destination_id','programs.id')
  ->select('programs.*','attachments.attachment')
  // ->orwhere('programs.type','Wildlife Safaris')
  // ->orwhere('programs.type','Combined Tours')
  ->where('programs.tour_circuit',$circuit_name)
   ->where('programs.category','Group')
  ->where('attachments.type','Programs')
  ->get();

        $circuitTourPrivate = program::
  join('attachments','attachments.destination_id','programs.id')
  ->select('programs.*','attachments.attachment')
  // ->orwhere('programs.type','Wildlife Safaris')
  // ->orwhere('programs.type','Combined Tours')
  ->where('programs.tour_circuit',$circuit_name)
   ->where('programs.category','Private')
  ->where('attachments.type','Programs')
  ->get();

    // $circuitTourf = program::join('attachments','programs.id','attachments.destination_id')
    //      ->join('itineraries','programs.id','itineraries.program_id')
    //      ->select('Programs.*','attachments.attachment')
    //       ->where('attachments.type','Programs')
    //       ->where('programs.tour_circuit',$circuit_name)
    //        ->where('programs.category','Private')
    //       ->where('itineraries.tour_addon','Programs')
    //      ->get();
       //dd($circuit_name);
        return view('website.circuitTour.circuitTour',compact('circuitTour','circuit_name','circuitTourPrivate'));

    }

     public function popularExperienceClient()
    {

   $popularExperiences = program::
  join('attachments','attachments.destination_id','programs.id') 
  ->select('programs.*','attachments.attachment')
   ->where('programs.popular_experience','Yes')
  ->where('attachments.type','Programs')
  ->get();

   $PostcategoryImage = title::where('title','Popular Experience')
          ->first();

    return view('website.popularExperiences.popularExperience',compact('popularExperiences','PostcategoryImage'));
    }

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
        //
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
        //
    }
}

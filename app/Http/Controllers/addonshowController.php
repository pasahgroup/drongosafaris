<?php

namespace App\Http\Controllers;


use App\Models\addons;

use App\Models\Tour;
use App\Models\accommodation;
use App\Models\attachment;
use App\Models\destination;
use App\Models\itinerary;
use App\Models\program;
use App\Models\popularExperience;
use App\Models\specialOffer;
use App\Models\slider;
use App\Models\Tourcostsummary;
use App\Models\buyaddons;
use App\Models\itinerary_day;
use App\Models\title;
use App\Models\accommodationInclusive;
use DB;
use Illuminate\Http\Request;

class addonshowController extends Controller
{
    public function index()
    {
           // $addons = addons::join('attachments','addons.id','attachments.destination_id')         
         //  ->where('attachments.type','addon')
         //   ->select('addons.*','attachments.attachment','attachments.destination_id')
         // ->get(); 
        $addons = program::join('attachments','programs.id','attachments.destination_id')         
          ->where('attachments.type','Addon')
          ->where('programs.main','Addon')
           ->select('programs.*','attachments.attachment','attachments.destination_id')
         ->get(); 
          
         //   $addons_accom = itinerary_day::join('itineraries','itineraries.id','itinerary_days.itinerary_id')
         //   ->join('accommodations','accommodations.id','itinerary_days.accommodation_id')
         //   ->join('attachments','attachments.destination_id','itineraries.program_id')
         // ->where('attachments.type','Accommodation')
         // ->select('accommodations.*','attachments.attachment','attachments.destination_id')
         //      ->get();
              

           $addons_accom = itinerary_day::join('itineraries','itineraries.id','itinerary_days.itinerary_id')
           ->join('programs','programs.id','itinerary_days.accommodation_id')
           ->join('attachments','attachments.destination_id','itineraries.program_id')
         ->where('attachments.type','Programs')
         ->where('programs.main','Addon')
         ->select('programs.*','attachments.attachment','attachments.destination_id')
              ->get();

                  $PostcategoryImage = title::where('title','Wildlife Safaris')
                  ->first();

                return view('website.buyaddons.showaddon',compact('addons','addons_accom','PostcategoryImage'));
    }



 public function show($id)
    {
 //dd('dd');
        
    $tour_addons = program::where('id', $id)->first();       
        $type=$tour_addons->main; 

        if($type=='Program')
        {
         $tour_addon='Programs';
        }
        else
        {
        $tour_addon='Addon';
        }

$discounts=specialOffer::where('tour_id',$id)->first(); 

        $programs = program::
           join('itineraries','itineraries.program_id','programs.id')
          ->join('attachments','programs.id','attachments.destination_id')
         ->where('attachments.type', $tour_addon)
         ->where('itineraries.tour_addon', $tour_addon)
         ->where('programs.id',$id)
            ->select('programs.*','attachments.attachment','itineraries.*')
          ->get()->first();
      
       $datas = itinerary::join('itinerary_days','itineraries.id','itinerary_days.itinerary_id')
        ->join('accommodations','accommodations.id','itinerary_days.accommodation_id')
        ->join('destinations','destinations.id','itinerary_days.destination_id')
        ->join('programs','programs.id','itineraries.program_id')
         ->join('locations','destinations.location_id','locations.id')
        ->join('attachments','accommodations.id','attachments.destination_id')
        ->orderby('itinerary_days.id','ASC')
        ->where('itineraries.tour_addon', $tour_addon)
        ->where('itineraries.program_id',$id)
        ->where('attachments.type','Accommodation')
        ->select('accommodations.*','accommodations.type',
        'itineraries.*','destinations.*','locations.*','programs.tour_name','itinerary_days.*','attachments.attachment')
        ->get();

//dd($datas);
         if($datas == "[]"){
      return redirect()->back()->with('info','The Program has no Itinery Data');
           };
        
        $get_type = program::whereid($id)->first();
        $type = $get_type->type;
       
        $addons = program::join('attachments','programs.id','attachments.destination_id')
        ->select('programs.*','attachments.attachment')
        ->where('programs.main','Addon')
        ->where('attachments.type','Addon')
        ->latest()->limit(3)->get();

        $addondatas = addons::
        join('attachments','addons.id','attachments.destination_id')
        ->join('itineraries','itineraries.program_id','addons.id')
        ->join('itinerary_days','itineraries.id','itinerary_days.itinerary_id')
        ->join('accommodations','accommodations.id','itinerary_days.accommodation_id')
        ->join('destinations','destinations.id','itinerary_days.destination_id')
        ->select('addons.*','attachments.attachment')
        ->where('addons.type','!=',$type)
        ->where('itineraries.tour_addon','Addon')
        ->where('attachments.type','accommodation')
        ->get();

       $basic = Tourcostsummary::
       where('status','Basic')
       ->where('program',$programs->tour_name)
       ->get();
        $comfort = Tourcostsummary::
       where('status','Comfort')
       ->where('program',$programs->tour_name)
       ->get();
        $luxury = Tourcostsummary::
       where('status','Deluxe')
       ->where('program',$programs->tour_name)
       ->get();

//Accommodation Inclusive
          $inclusives=DB::select("select id,inclusive from inclusives  where id not in(select (inclusive_id)id from accommodation_inclusives where tour_id =$id)");

           $assignLists = accommodationInclusive::join('inclusives','accommodation_inclusives.inclusive_id','inclusives.id')
        ->where('accommodation_inclusives.tour_id',$id)->get();
 //End of accommodation Inclusive  
    
         $buyaddons= buyaddons::join('programs','programs.id','buyaddons.program_id')
          ->where('buyaddons.program_id',$id)
         ->get();

        return view('website.tour.tourSummary',compact('datas','id','programs','basic','comfort','luxury','buyaddons','addons','addondatas','discounts','inclusives','assignLists'));
    }


      public function show2($id)          
         {

        $tour_addon='addon';
        $programs = program::
           join('itineraries','itineraries.program_id','programs.id')
        ->join('attachments','programs.id','attachments.destination_id')
        ->where('attachments.type','Addon')
        ->where('itineraries.tour_addon','Addon')
         ->where('programs.id',$id)->first();
   
       $datas = itinerary::join('itinerary_days','itineraries.id','itinerary_days.itinerary_id')
        ->join('accommodations','accommodations.id','itinerary_days.accommodation_id')
        ->join('destinations','destinations.id','itinerary_days.destination_id')
        ->join('programs','programs.id','itineraries.program_id')
        ->join('attachments','attachments.destination_id','accommodations.id')
        ->orderby('itinerary_days.id','ASC')
        ->where('itineraries.tour_addon','Addon')
        ->where('itineraries.program_id',$id)
        ->where('attachments.type','Accommodation')
        ->select('accommodations.accommodation_name','attachments.attachment','accommodations.accommodation_descriptions','accommodations.category','destinations.destination_name','itineraries.*','programs.tour_name','itinerary_days.*')
        ->get();
     
         if($datas == "[]"){
            $programs = program::where('id',$id)->first();
            $accommodations = accommodation::get();
            $destinations = destination::get();
            return view('admins.Itinerary.add',compact('programs','accommodations','destinations','tour_addon'));
         };

         $buyaddons= buyaddons::join('programs','programs.id','buyaddons.program_id')
          ->where('buyaddons.program_id',$id)
         ->get();

   $addons = program::
      join('attachments','attachments.destination_id','programs.id')
   ->select('programs.*','attachments.attachment')
    ->where('attachments.type','addon')
       ->get();

        $addonscosts = program::
      where('programs.id',$id)
       ->get();
      
        return view('website.buyaddons.addonSummary',compact('datas','id','programs','buyaddons','addons','addonscosts'));
    }
}

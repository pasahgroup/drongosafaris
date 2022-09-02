<?php

namespace App\Http\Controllers;

use App\Models\enquiry;
use App\Models\program;
use App\Models\specialOffer;
use App\Models\itinerary;
use App\Models\addons;
use App\Models\Tourcostsummary;
use App\Models\accommodationInclusive;
use App\Models\buyaddons;

use DB;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = enquiry::join('programs','enquiries.tour_id','programs.id')
        ->select('enquiries.*','programs.tour_name')
        ->get(); 
       // dd($datas);       
        return view('admins.enquiries.enquiry',compact('datas'));
    }
   


    public function enquiry()
    {
        return view('website.enquiries.enquiry');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

  public function bookFor($idf)
    {
       

         $enquiries=enquiry::where('id',$idf)
         ->first();
          $id=$enquiries->tour_id;

          $discounts=specialOffer::where('tour_id',$id)->first();
      
        $tour_addon='bookFor';
        $programs = program::
           join('itineraries','itineraries.program_id','programs.id')
          ->join('attachments','programs.id','attachments.destination_id')
         ->where('attachments.type','Programs')
         ->where('itineraries.tour_addon','programs')
         ->where('programs.id',$id)
            ->select('programs.*','attachments.attachment','itineraries.*')
          ->get()->first();
        
        
       $datas = itinerary::join('itinerary_days','itineraries.id','itinerary_days.itinerary_id')
        ->join('accommodations','accommodations.id','itinerary_days.accommodation_id')
        ->join('destinations','destinations.id','itinerary_days.destination_id')
        ->join('programs','programs.id','itineraries.program_id')
         ->join('locations','accommodations.location_id','locations.id')
        ->join('attachments','accommodations.id','attachments.destination_id')
        ->orderby('itinerary_days.id','ASC')
        ->where('itineraries.tour_addon','programs')
        ->where('itineraries.program_id',$id)
        ->where('attachments.type','Accommodation')
        ->select('accommodations.*','accommodations.type',
        'itineraries.*','destinations.*','locations.*','programs.tour_name','itinerary_days.*','attachments.attachment')
        ->get();


         if($datas == "[]"){
          
            $programs = program::where('id',$id)->first();
            $accommodations = accommodation::get();
            $destinations = destination::get();
            return view('admins.itinerary.add',compact('programs','accommodations','destinations','tour_addon'));
           };
        
        $get_type = program::whereid($id)->first();
        $type = $get_type->type;
        $addons = addons::join('attachments','addons.id','attachments.destination_id')
        ->select('addons.*','attachments.attachment')
        ->where('addons.type','!=',$type)
        ->where('attachments.type','addon')
        ->latest()->limit(3)->get();

        $addondatas = addons::
        join('attachments','addons.id','attachments.destination_id')
        ->join('itineraries','itineraries.program_id','addons.id')
        ->join('itinerary_days','itineraries.id','itinerary_days.itinerary_id')
        ->join('accommodations','accommodations.id','itinerary_days.accommodation_id')
        ->join('destinations','destinations.id','itinerary_days.destination_id')
        ->select('addons.*','attachments.attachment')
        ->where('addons.type','!=',$type)
        ->where('itineraries.tour_addon','addon')
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

        $tours=program::get();
        return view('admins.enquiries.bookFor',compact('datas','id','programs','basic','comfort','luxury','buyaddons','addons','addondatas','discounts','inclusives','assignLists','enquiries','tours'));
     }


      public function editEnquiry($id)
    {

        $tour_addon='tailor_made';
         $tailorMades = enquiry::where('id',$id)
         ->first();
         $tours = program::where('id',$tailorMades->tour_id)
         ->first();

        $tourTypes = program::get(); 
       //dd($tours);             
       return view('admins.enquiries.addEditEnquiry',compact('tailorMades','tour_addon','id','tourTypes','tours'));
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
    
   $programs=program::where('id',request('tour_id'))->first();
     $days=$programs->days;

     $pin=rand(1111111, 9999999);
    // $days= $id=2;  
      $start_date=request('arrival_date');
     $start_datef=date('Y-m-d', strtotime($start_date));
       $end_date=date('Y-m-d', strtotime($start_date. ' + '.$days.' days'));

        $tailorMadeSummary = enquiry::create([
        'first_name'=>request('first_name'),
        'last_name'=>request('last_name'),
        'country'=>request('nationality'),
        'phone'=>request('phone'),
        'email'=>request('email'),
         'arrival_date'=>$start_datef,
           'adults'=>request('adults'),
           'teens'=>request('teens'),
            'children'=>request('children'),
        'days'=>$days,
        'tour_id'=>request('tour_id'),        
        //'destination'=>request('destination'),
        'accomodation'=>request('accomodation'),    
       'end_date'=>$end_date,
        'pin'=>$pin,
        'status'=>'Active',
        'enquiry'=>request('other_information')
        //'hear_about_us'=>request('hear_about_us'),
        ]); 
       
        // foreach ($hear_from as $hears) {
        // $tourhearfrom = tourEquerySocialMedia::create([
        // 'tour_equery_id'=>$tailorMadeSummary->id,
        // 'social_name'=>$hears,
        // 'from_name'=>'tailor_made'
        
        // ]);
        // }    
        
        return redirect()->back()->with('success','SuccessfulSubmitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $programs = program::get();
       $tours = program::where('id',$id)
       ->first();
        //dd($programs);
      return view('website.enquiries.enquiry',compact('programs','tours'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(enquiry $enquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
//dd(request('other_information'));
$programs=enquiry::where('id',$id)->first();
     $days=$programs->days;
 
      $start_date=request('arrival_date');
     $start_datef=date('Y-m-d', strtotime($start_date));
       $end_date=date('Y-m-d', strtotime($start_date. ' + '.$days.' days'));
  
        $toupdate = enquiry::where('id',$id)->update([
            'first_name'=>request('first_name'),
        'last_name'=>request('last_name'),
        'country'=>request('nationality'),
        'phone'=>request('phone'),
        'email'=>request('email'),
         'arrival_date'=>$start_datef,
           'adults'=>request('adults'),
           'teens'=>request('teens'),
            'children'=>request('children'),
        'days'=>$days,
        'tour_id'=>request('tour_id'),        
        //'destination'=>request('destination'),
        'accomodation'=>request('accomodation'),    
       'end_date'=>$end_date,
        //'pin'=>$pin,
        'status'=>'Active',
        'enquiry'=>request('other_information')
        ]);
        return redirect()->route('enquiry.index')->with('success','successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {      

        //dd($id);
        $delete = enquiry::where('id',$id)->first();
        if($delete->delete()){           
               DB::statement("delete from attachments where destination_id=$id and type='tailor_made'");
            return redirect()->route('enquiry.index')->with('success','tailor made removed successfully');
        }    
        else{
            return redirect('/')->route('/enquiry')->with('error','Enquiry not exists');
        }

    }
}

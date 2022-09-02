<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Service;
use App\Models\accommodation;
use App\Models\addons;
use App\Models\attachment;
use App\Models\destination;
use App\Models\itinerary;
use App\Models\program;
use App\Models\popularExperience;
use App\Models\specialOffer;
use App\Models\slider;
use App\Models\Tourcostsummary;
use App\Models\buyaddons;
use App\Models\socialmedia;
use App\Models\title;
use App\Models\accommodationInclusive;
use DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
    //     $title='Wildlife Safaris';
    //      $safaris = program::join('attachments','programs.id','attachments.destination_id')
    //      ->join('itineraries','programs.id','itineraries.program_id')
    //      ->select('programs.*','attachments.attachment')
    //       ->where('attachments.type','Programs')
    //       ->where('programs.type','Wildlife Safaris')
    //       ->where('itineraries.tour_addon','Programs')
    //      ->get();

    //       $PostcategoryImage = title::where('title', $title)
    //       ->first();
         
    //     return view('website.programs.safaris',compact('safaris','title','PostcategoryImage'));
    
    
       $Postcategory = service::get();
        return view('admins.themes.addWhatWeOffer',compact('Postcategory'));
     }

     public function safarisSlider($x)
    {
           $sliders = slider::join('programs','programs.id','sliders.tour_id')
           ->where('programs.id',$x)
          ->get()->first();

         // dd($sliders);
          if($sliders->type=='Wildlife Safaris')
          {
             $title='Wildlife Safaris';
          }
          else if($sliders->type=='Hiking & trekking'){
             $title='Mt.Hiking & Trekking';
          }
           else if($sliders->type=='Beach Holidays'){
             $title='Beach Holiday';

          }
            else if($sliders->type=='Combined Tours'){
             $title='Combined Tours';
             
          }
            else if($sliders->type=='Historical Sites'){
             $title='Historical Sites';
             
          }
            else if($sliders->type=='Day Tours'){
             $title='Day Tours';
             
          }
          else
          {
          $title='No Title';
          }
        

         $safaris = program::join('attachments','programs.id','attachments.destination_id')
         ->join('itineraries','programs.id','itineraries.program_id')
         ->select('programs.*','attachments.attachment')
          ->where('attachments.type','Programs')
          ->where('programs.type',$sliders->type)
          ->where('itineraries.tour_addon','Programs')
         ->get();

      $PostcategoryImage = title::where('title', $title)
          ->first();
           return view('website.programs.safaris-slider',compact('safaris','sliders','title','PostcategoryImage'));
     }

  public function safarisSliderTourPackages($x)
    {
      
          //$sliders=slider::limit(1)->first();
            $programs=program::join('attachments','programs.id','attachments.destination_id')
             ->select('programs.*','attachments.attachment')
            ->where('programs.id',$x)
             ->where('attachments.type','programs')
            ->where('programs.id',$x)
            ->first();
              
           // dd($programs->type);
          if($programs->type=='Wildlife Safaris')
          {
             $title='Wildlife Safaris';
          }
          else if($programs->type=='Hiking & trekking'){
             $title='Mt.Hiking & Trekking';
          }
           else if($programs->type=='Beach Holidays'){
             $title='Beach Holidays';

          }
            else if($programs->type=='Combined Tours'){
             $title='Combined Tours';
             
          }
            else if($programs->type=='Historical Sites'){
             $title='Historical Sites';
             
          }
            else if($programs->type=='Day Tours'){
             $title='Day Tours';
             
          }
          else
          {
          $title='No Title';
          }
        $title='Drongo Safaris '.$title;

         $safaris = program::join('attachments','programs.id','attachments.destination_id')
         ->join('itineraries','programs.id','itineraries.program_id')
         ->select('programs.*','attachments.attachment')
          ->where('attachments.type','Programs')
          ->where('programs.type',$programs->type)
          ->where('itineraries.tour_addon','Programs')
         ->get();

      $PostcategoryImage = title::where('title', $title)
          ->first();
           return view('website.programs.safaris-slider-packages',compact('safaris','programs','title','PostcategoryImage'));
     }



      public function trekking()    {
         $title="Mt.Hiking & Trekking";
         $safaris = program::join('attachments','programs.id','attachments.destination_id')
         ->join('itineraries','programs.id','itineraries.program_id')
         ->select('programs.*','attachments.attachment')
          ->where('attachments.type','Programs')
          ->where('programs.type','Hiking & Trekking')
          ->where('itineraries.tour_addon','Programs')
         ->get();
       

  $PostcategoryImage = title::where('title', $title)
          ->first();
          //  dd($PostcategoryImage);
         return view('website.programs.safaris',compact('safaris','title','PostcategoryImage'));
    }

    public function holiday()
    {
         $title='Beach Holiday';
         $safaris = program::
         join('attachments','programs.id','attachments.destination_id')
         ->join('itineraries','programs.id','itineraries.program_id')
         ->select('programs.*','attachments.attachment')
          ->where('attachments.type','Programs')
          ->where('programs.type','Beach Holidays')
          ->where('itineraries.tour_addon','Programs')
         ->get();
          $PostcategoryImage = title::where('title', $title)
          ->first();
           
    return view('website.programs.safaris',compact('safaris','title','PostcategoryImage'));
    }


     public function dayTours()    {
         $title="Day Tours";
         $safaris = program::join('attachments','programs.id','attachments.destination_id')
         ->join('itineraries','programs.id','itineraries.program_id')
         ->select('programs.*','attachments.attachment')
          ->where('attachments.type','Programs')
          ->where('programs.type','Day Tours')
          ->where('itineraries.tour_addon','Programs')
         ->get();       

         $PostcategoryImage = title::where('title', $title)
          ->first();
            //dd($PostcategoryImage);
         return view('website.programs.safaris',compact('safaris','title','PostcategoryImage'));
    }

     public function combinedTours()    {
         $title="Combined Tours";
         $safaris = program::join('attachments','programs.id','attachments.destination_id')
         ->join('itineraries','programs.id','itineraries.program_id')
         ->select('programs.*','attachments.attachment')
          ->where('attachments.type','Programs')
          ->where('programs.type','Combined Tours')
          ->where('itineraries.tour_addon','Programs')
         ->get();
       

  $PostcategoryImage = title::where('title', $title)
          ->first();
         return view('website.programs.safaris',compact('safaris','title','PostcategoryImage'));
    }

 public function historicalSites()    {
         $title="Historical Sites";
         $safaris = program::join('attachments','programs.id','attachments.destination_id')
         ->join('itineraries','programs.id','itineraries.program_id')
         ->select('programs.*','attachments.attachment')
          ->where('attachments.type','Programs')
          ->where('programs.type','Historical Site')
          ->where('itineraries.tour_addon','Programs')
         ->get();
       

  $PostcategoryImage = title::where('title', $title)
          ->first();
         return view('website.programs.safaris',compact('safaris','title','PostcategoryImage'));
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
       
        $program =  service::UpdateOrCreate(
            ['id_unique'=> request('id_unique')],               
               
             ['category'=>request('post_category'),    
             'title'=>request('title'),
              'body'=>request('post_body'),  
               'user_id'=>auth()->id()
            
            ]);
         DB::statement("update services set id_unique=$program->id where id=$program->id");
     

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

            //$id = attachment::where()
            $id = attachment::where('destination_id', '=', $program->id)
            ->where('type','Service')
            ->get()->first();
           

             if($id !=null)
             {
            $toupdate = attachment::where('destination_id',$program->id)
             ->where('type','Service')
             ->update([
            'attachment'=>$imageToStore
        ]);
           }else
           {
           attachment::Create(
                [
                'destination_id'=>$program->id,
                'attachment'=>$imageToStore,
                'type'=>'Service'
                ]
                ); 
              
        }
         }
     }
         return redirect()->route('whatWeOffer')->with('success','Created successfuly');
            
    }

//What We Offer
     public function whatWeOffer()
    {
     $Postcategory = service::where('category','What We Offer')
     ->get();
     return view('admins.themes.whatWeOffer',compact('Postcategory'));
    }


   //Edit Message intro
      public function editWhatWeOffer($id)
    {     
        $messageBody = service::where('id',$id)
        ->get()->first();
        return view('admins.themes.editWhatWeOffer',compact('messageBody'));
     }


   public function whatWeOfferClient()
    {     
       $title = title::where('title','What We Offer')->first();
       $description = title::where('title','What We Offer')->first();
       $keywords = title::where('title','What We Offer')->first();
       //dd($title);

          $Postcategory = service::join('attachments','attachments.destination_id','services.id')
        ->where('attachments.type','Service')
         ->get();   

         $PostcategoryImage = title::where('title','What We Offer')
          ->first();
      
        // dd($PostcategoryImage);
         return view('website.whatWeOffer.whatWeOfferClient',compact('Postcategory','PostcategoryImage','title','description','keywords'));
         }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  
        $discounts=specialOffer::where('tour_id',$id)->first();
      
        $tour_addon='Programs';
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

        return view('website.tour.tourSummary',compact('datas','id','programs','basic','comfort','luxury','buyaddons','addons','addondatas','discounts','inclusives','assignLists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
      public function destroy($id)
    {
        //dd($id);
        $delete = service::where('id',$id)->first();
        if($delete->delete()){
         return redirect()->back()->with('success','"$delete->title"'.' removed successfully');
        }    
        else{
            return redirect()->back()->with('error','"$delete->title"'.' not exists');
       
        }
    }
}

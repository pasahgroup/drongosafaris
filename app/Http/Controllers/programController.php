<?php

namespace App\Http\Controllers;

use App\Models\accommodation;
use App\Models\attachment;
use App\Models\destination;
use App\Models\itinerary;
use App\Models\itinerary_day;
use App\Models\program;
use App\Models\specialOffer;
use Illuminate\Http\Request;
use DB;

class programController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = program::join('attachments','attachments.destination_id','programs.id')
        ->select('programs.*','attachments.attachment')
        ->where('attachments.type','Programs')
         ->orWhere('attachments.type','Addon')
        ->get();
        return view('admins.programs.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.programs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // No of days before update on itenary table
       //dd (request('main'));

        if(request('main')=='Program')
        {
         $type='Programs';
        }
        else
        {
        $type='Addon';
        }

           $pin=rand(1111,9999);
           $storeType=request('edit');
            $itDaysBefore=itinerary::where('program_id',request('id'))
             ->where('tour_addon',$type)
             ->get()->first();  

          $program =  program::UpdateOrCreate(
            [   'tour_name'=>request('tour_name')],
            [
                'days'=>request('days'),
                 'cost'=>request('cost'),
                'price'=>request('price'),
                'currency'=>request('currency'),
                'category'=>request('category'),
                'type'=>request('type'),
                'style'=>request('style'),
                 'main'=>request('main'),
                 'tour_code'=>$pin,
                 'tour_circuit'=>request('tour_circuit'),
                'overview'=>request('overview'),
                'tour_highlight'=>request('tour_highlight'),
                'physical_rating'=>request('physical_rating'),
                'popular_experience'=>request('popular_experience'),
                'seo'=>request('seo'),
                'user_id'=>auth()->id()
            ]);

         // dd($program->id);
        //Update Price offer,Get Discount value first
         $discount=specialOffer::where('tour_id',$program->id)
         ->get()->first();
         
         if($discount !=null)
         {
         $newPrice=request('price')-$discount->discount;
              $offerUpdate = specialOffer::where('tour_id',$program->id)             
             ->update([
            'new_price'=> $newPrice
        ]);
        }
       //End of Price offer

       //Update Itenary day
              $itenaryUpdate = itinerary::where('program_id',$program->id)
             ->where('tour_addon', $type)
             ->update([
            'days'=>request('days')
        ]);
        
         //Get ItenaryID
          $it=itinerary::where('program_id',$program->id)
             ->where('tour_addon', $type)
             ->get()->first();
       //End of Update Itenary day
          
         //End of delete
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

       
           $id = attachment::where('destination_id', '=', $program->id)
            ->where('type', $type)
            ->get()->first();
           
          if($id !=null)
            {
             $toupdate = attachment::where('destination_id',$program->id)
             ->where('type', $type)
             ->update([
            'attachment'=>$imageToStore
           ]);
           }else
           {
              attachment::Create(
                [
                'destination_id'=>$program->id,
                'attachment'=>$imageToStore,
                'type'=> $type
                ]
                );          
         }
        }
      }
        if($storeType=='Edit')
        {
        return redirect()->route('programs.index')->with('success','Created successfuly');
        }else{
        return redirect()->route('inclusive.show',$program->id)->with('success','Created successfuly');
        }
      
    }

//Edit program
    public function editProgram($id)
    {

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

         $tours = program::join('attachments','programs.id','attachments.destination_id')
        ->select('programs.*','attachments.attachment')
        ->where('programs.id',$id)
        ->where('attachments.type',$tour_addon)
        ->get()->first(); 
        
    return view('admins.programs.editProgram',compact('tours')); 
     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {     
          
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

        $programs =program::join('itineraries','itineraries.program_id','programs.id')
        ->where('programs.id',$id)->first();
      //dd($programs);

        $datas = itinerary::join('itinerary_days','itineraries.id','itinerary_days.itinerary_id')
        ->join('accommodations','accommodations.id','itinerary_days.accommodation_id')
        ->join('destinations','destinations.id','itinerary_days.destination_id')
        ->join('programs','programs.id','itineraries.program_id')
        ->orderby('itinerary_days.id','ASC')
        ->where('itineraries.tour_addon',$tour_addon)
        ->where('itineraries.program_id',$id)
        ->select('accommodations.accommodation_name','destinations.destination_name','itineraries.*','itinerary_days.itinerary_id','programs.tour_name','itinerary_days.*')
        ->get();

      
       $datasf=itinerary::where('program_id',$id)
      ->get()->first();
       
        $accommodations = accommodation::get();
        $destinations = destination::get();

          if($datas == "[]"){
           $programs = program::where('id',$id)->first();
           //dd($programs); 
            return view('admins.Itinerary.add',compact('programs','accommodations','destinations','tour_addon','id'));
           };

      
       $unfilledDays=itinerary_day::where('itinerary_id',$datasf->id)
        ->where('accommodation_id',0)
        ->count();

        $filledDays=itinerary_day::where('itinerary_id',$datasf->id)
        ->where('accommodation_id','!=',0)
        ->count();            
       // dd($datas);
        return view('admins.Itinerary.addEdit',compact('datas','id','programs','tour_addon','accommodations','destinations','unfilledDays','filledDays'));
       } 
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatef(Request $request,$id)
    {
        // No of days before update on itenary table


        if(request('main')=='Program')
        {
         $type='Programs';
        }
        else
        {
        $type='Addon';
        }

         $tour_addon='programs'; 
           $storeType=request('edit');

            $accommodations = accommodation::get();
            $destinations = destination::get();

           $itDaysBefore=itinerary::where('program_id',request('id'))
             ->where('tour_addon', $type)
             ->get()->first();                 


              $program = program::where('id',request('id'))
               ->update([

                'tour_name'=>request('tour_name'),
                'days'=>request('days'),
                'cost'=>request('cost'),
                'price'=>request('price'),
                'currency'=>request('currency'),
                'category'=>request('category'),
                'type'=>request('type'),
                'style'=>request('style'),
                 'main'=>request('main'),
                 'tour_code'=>request('tour_code'),
                 'tour_circuit'=>request('tour_circuit'),
                'overview'=>request('overview'),
                'tour_highlight'=>request('tour_highlight'),
                'physical_rating'=>request('physical_rating'),
                'popular_experience'=>request('popular_experience'),
                'seo'=>request('seo'),
                'user_id'=>auth()->id()

              ]);

            if($itDaysBefore==null)
             {
                 return redirect()->route('programs.show',$id)->with('success','Itinerary created successful');
             }
           

        //Update Price offer,Get Discount value first
         $discount=specialOffer::where('tour_id',$id)
         ->get()->first();
         
         if($discount !=null)
         {
         $newPrice=request('price')-$discount->discount;
              $offerUpdate = specialOffer::where('tour_id',$id)             
             ->update([
            'new_price'=> $newPrice
        ]);
        }
       //End of Price offer

       //Update Itenary day
              $itenaryUpdate = itinerary::where('program_id',$id)
             ->where('tour_addon', $type)
             ->update([
            'days'=>request('days')
        ]);
        
                 

         //Get ItenaryID
          $it=itinerary::where('program_id',$id)
             ->where('tour_addon', $type)
             ->get()->first();
       //End of Update Itenary day
            
             $itDefDays=request('days')-$itDaysBefore->days;           
             if($itDefDays<0)
             {
                $itDefDays=$itDefDays * -1;
                $i=0;
                while($i<$itDefDays)
                {
              $im=itinerary_day::
              where('itinerary_id',$it->id)
              ->max('id');
    
             //Deleting Existing days in itenary days
             if($im !=null)
             {
                 DB::statement("delete from itinerary_days where id=$im");           
             }
             $i +=1;
                }                 
             }
             else
             {
                //Count rows in itenaries_day
                    $itenaries_dayCount=itinerary_day::where('itinerary_id',$itDaysBefore->id) 
                    ->count();        
                    $itenaries_dayCount=$itenaries_dayCount+1;
              
                $def=request('days')-$itenaries_dayCount;
                //dd($def);
                    //Add days to the itenaries_day table
       $z=0;
      while($z<=$def)
            {
         $program =  itinerary_day::create(
            [  
                'itinerary_id'=>$itDaysBefore->id,
                'day'=>$itenaries_dayCount,
                'itinerary_title'=>'nill',
                'itinerary_description'=>'nill',
                'destination_id'=>0,
                'accommodation_id'=>0
            ]);
           $z +=1;
          $itenaries_dayCount +=1;
           }  
        }
 
                    //End of delete
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

          //dd($id);
           $idf = attachment::where('destination_id', '=', $id)
            ->where('type', $type)
            ->first();
           
          if($idf !=null)
            {
             $toupdate = attachment::where('destination_id',$id)
             ->where('type', $type)
             ->update([
            'attachment'=>$imageToStore
           ]);
           }else
           {
            //dd($id);
              attachment::Create(
                [
                'destination_id'=>$id,
                'attachment'=>$imageToStore,
                'type'=> $type
                ]
                );          
         }
        }
      }
        if($storeType=='Edit')
        {
        return redirect()->route('programs.index')->with('success','Created successfuly');
        }else{
        return redirect()->back()->with('success','Created successfuly');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyf($id)
    {
         //dd($id);
        $delete = program::where('id',$id)->first();
        if($delete->delete()){
             DB::statement("delete from departures where tour_id=$id");
              DB::statement("delete from special_offers where tour_id=$id");
               DB::statement("delete from attachments where destination_id=$id and type='Programs'");
            return redirect()->route('programs.index')->with('info','Program removed successfully');
        }    
        else{
            return redirect()->route('programs.index')->with('error','Widget not exists');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\accommodation;
use App\Models\destination;
use App\Models\itinerary;
use App\Models\itinerary_day;
use App\Models\program;
use App\Models\tailorMade;

use Illuminate\Http\Request;

class itineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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

        $main_itinerary = itinerary::UpdateOrCreate(
            [ 'program_id'=>request('program_id'),
              'tour_addon'=>request('tour_addon')],

               [ 'itinerary_summury'=>request('itinerary_summury'),
                'days'=>request('days'),               
                'user_id'=>request('user_id')
            ]);

//dd($main_itinerary->program_id);

            $title = request('itinerary_title');
            $day = request('day');
            $description = request('itinerary_description');
            $destination = request('destination_id');
            $accommodation = request('accommodation_id');

             $distance = request('distance');
              $transport = request('transport');
               $meal = request('meal');

              foreach($day as $key => $day){
                $input['day']=$day;
                $input['itinerary_id']=$main_itinerary->id;
                $input['itinerary_title']=$title[$key];

                 $input['distance']=$distance[$key];
                  $input['transport']=$transport[$key];
                   $input['meal']=$meal[$key];

                $input['itinerary_description']=$description[$key];
                $input['destination_id']=$destination[$key];
                $input['accommodation_id']=$accommodation[$key];

                $day_itinerary = itinerary_day::UpdateOrCreate($input);
    }

        return redirect()->route('programs.show',request('program_id'))->with('success','Itinerary created successful');
    }


//This method update itenary_day table after editing days on program page
 public function updateItenary(Request $request)
    {
          $id=request('program_id');

           $main_itinerary = itinerary::UpdateOrCreate(
            [ 'program_id'=>request('program_id'),
              'tour_addon'=>request('tour_addon')],

               [ 'itinerary_summury'=>request('itinerary_summury'),
                'days'=>request('days'),
               
                'user_id'=>request('user_id')
            ]);


            $title =  ('itinerary_title');
            $day = request('day');
            $description = request('itinerary_description');
            $destination = request('destination_id');
            $accommodation = request('accommodation_id');
               
            $distance = request('distance');
            $transport = request('transport');
            $meal = request('meal');
        
    if(request('day')>0)
    {
    foreach($day as $key => $days){      
    $toupdate = itinerary_day::where('itinerary_id',$main_itinerary->id)
    ->where('day',$days)->update([
            'itinerary_title'=>$title[$key],

            'distance'=>$distance[$key],
            'transport'=>$transport[$key],
            'meal'=>$meal[$key],

            'itinerary_description'=>$description[$key],
            'destination_id'=>$destination[$key],
            'accommodation_id'=>$accommodation[$key]
        ]);
     }
   }

        return redirect()->route('programs.show',$id)->with('success','Itinerary created successful');
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
      
        $accommodations = accommodation::join('attachments','accommodations.id','attachments.destination_id')
        ->select('accommodations.*','attachments.attachment')
        ->where('attachments.type','Accommodation')
        ->get();
  
        $destinations = destination::get();
        $day_data = itinerary_day::join('itineraries','itineraries.id','itinerary_days.itinerary_id')
        ->select('itineraries.program_id','itineraries.tour_addon','itinerary_days.*')
        ->where('itinerary_days.id',$id)->first();
       // dd($day_data);

    $destination_name = destination::where('id',$day_data->destination_id)->first();
       $accommodation_name = accommodation::where('id',$day_data->accommodation_id)->first();

        return view('admins.Itinerary.edit',compact('day_data','accommodations','destinations','destination_name','accommodation_name'));
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
        $destination = request('destination_id');
        $accommodation = request('accommodation_id');

        $toupdate = itinerary_day::where('id',$id)->update([
            'itinerary_title'=>request('itinerary_title'),

          'distance'=>request('distance'),
          'transport'=>request('transport'),
          'meal'=>request('meal'),

            'itinerary_description'=>request('itinerary_description'),
            'destination_id'=>$destination[0],
            'accommodation_id'=>$accommodation[0],
        ]);
      //Take Program ID
        if(request('tour_addon')=="tailor_made"){
        $programs = tailorMade::join('itineraries','itineraries.program_id','tailor_mades.id')
        ->join('itinerary_days','itinerary_days.itinerary_id','itineraries.id')
        ->where('itinerary_days.id',$id)->first();
          
         $id=$programs->program_id;
           return redirect()->route('attachmentTailorMade',$id)->with('success','Edited successfuly');
        }
        else
        {
        $programs = program::join('itineraries','itineraries.program_id','programs.id')
        ->join('itinerary_days','itinerary_days.itinerary_id','itineraries.id')
        ->where('itinerary_days.id',$id)->first();  

         $id=$programs->program_id;
        return redirect()->route('programs.show',$id)->with('success','Edited successfuly');
        }       
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

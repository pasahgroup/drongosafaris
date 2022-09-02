<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\addons;
use App\Models\accommodation;
use App\Models\location;
use App\Models\attachment;
use App\Models\destination;
use App\Models\itinerary;
use App\Models\itinerary_day;
use App\Models\program;
use App\Models\specialOffer;
use App\Models\slider;
use App\Models\Tourcostsummary;
use App\Models\buyaddons;
use App\Models\socialmedia;

use Illuminate\Http\Request;

class accommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $datas = accommodation::join('locations','accommodations.location_id','locations.id')
             ->select('accommodations.*','locations.location_name')
            ->get();
        return view('admins.accommodations.index',compact('datas'));
    }

//Accommodation list
     public function accommodationList()
    {           

        $datas = accommodation:: join('attachments','accommodations.id','attachments.destination_id')
            ->join('locations','accommodations.location_id','locations.id')
            //->join('destinations','destinations.location_id','accommodations.location_id')
            ->where('attachments.type','Accommodation')
             ->where('accommodations.category','!=','Camp')
             ->select('accommodations.*','locations.*','attachments.attachment')
             ->get();
        return view('website.accommodation.accommodationlist',compact('datas'));

    }


     public function accommodationCamp()
    {           

        $datas = accommodation:: join('attachments','accommodations.id','attachments.destination_id')
            ->join('locations','accommodations.location_id','locations.id')
            //->join('destinations','destinations.location_id','accommodations.location_id')
            ->where('attachments.type','Accommodation')
             ->where('accommodations.category','Camp')
             ->select('accommodations.*','locations.*','attachments.attachment')
             ->get();
        return view('website.accommodation.accommodationlist',compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $datas = location::get();
  return view('admins.accommodations.add',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //See if the location is Exists
     
         $location=accommodation::where('accommodation_name',request('accommodation_name'))
        ->where('location_id',request('location_id'))
        ->get()->first();
  
       if($location ==null)
       {      
        $accomodate = accommodation::create(
        [
        'accommodation_name'=>request('accommodation_name'),
        'location_id'=>request('location_id'),
        'price'=>request('price'),
        'currency'=>request('currency'),
        'category'=>request('category'),
         'national_standard'=>request('national_standard'),
        'type'=>request('type'),
        'accommodation_descriptions'=>request('accommodation_descriptions'),
        'phone'=>request('phone'),
          'email'=>request('email'),
         'url'=>request('url'),
        'seo'=>request('seo'),       
        'user_id'=>auth()->id()
        ]);
         // dd($accomodate->id);
        $idf=$accomodate->id;
       }
      else
       {
            return redirect()->route('accommodations.index')->with('info','This Accommodation Exists');
       }

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
            
            
           $id = attachment::where('destination_id', '=', $idf)
            ->where('type','Accommodation')
            ->get()->first();
          //  dd($id);

             if($id !=null)
             {
             $toupdate = attachment::where('destination_id',$idf)
             ->where('type','Accommodation')
             ->update([
            'attachment'=>$imageToStore
        ]);
           }else
           {
         attachment::UpdateOrCreate(
                [
               'destination_id'=>$idf,
                'attachment'=>$imageToStore,
                'type'=>'Accommodation'
                ]
                );
            }
            }
        }
        return redirect()->route('accommodations.index')->with('success','Accommodation created successful');
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
        $accommodations = accommodation::join('locations','accommodations.location_id','locations.id')
        ->where('accommodations.id',$id)->get();
        $attachments = attachment::where('destination_id',$id)->where('type','Accommodation')->get();
       // dd($accommodations);
        return view('admins.accommodations.show',compact('accommodations','attachments'));
    }


 //Edit Accommodation
      public function editAccommodation($id){
      
        $accommodations = accommodation::get();     
        $datas = accommodation::join('locations','accommodations.location_id','locations.id')
         ->select('accommodations.*','locations.location_name')
        ->where('accommodations.id',$id)
        ->get()->first();
        //dd($accommodations->id);
             $locations = location::get();    
               return view('admins.accommodations.editAccommodation',compact('datas','locations','accommodations'));
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
   //dd(request('location_id'));
  $toupdate = accommodation::where('id',$id)->update([
        'accommodation_name'=>request('accommodation_name'),
        'location_id'=>request('location_id'),
        'price'=>request('price'),
        'currency'=>request('currency'),
        'category'=>request('category'),
         'national_standard'=>request('national_standard'),
        'type'=>request('type'),
        'accommodation_descriptions'=>request('accommodation_descriptions'),
        'phone'=>request('phone'),
          'email'=>request('email'),
         'url'=>request('url'),
        'seo'=>request('seo'),       
        'user_id'=>auth()->id()
          ]);
  $idf=$id;

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
            
            
           $id = attachment::where('destination_id', '=', $idf)
            ->where('type','Accommodation')
            ->get()->first();
           // dd($idf);

             if($id !=null)
             {
             $toupdate = attachment::where('destination_id',$idf)
             ->where('type','Accommodation')
             ->update([
            'attachment'=>$imageToStore
        ]);
           }else
           {
         attachment::UpdateOrCreate(
                [
               'destination_id'=>$idf,
                'attachment'=>$imageToStore,
                'type'=>'Accommodation'
                ]
                );
            }
            }
        }



 return redirect()->route('accommodations.index')->with('success','Accommodation created successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $delete = accommodation::where('id',$id)->first();
        if($delete->delete()){
         return redirect()->back()->with('success','Accommodation'." ".$delete->accommodation_name." ".$delete->category.' removed successfully');
        }    
        else{
            return redirect()->back()->with('error','Accommodation'." ".$delete->accommodation_name." ". $delete->category.' not exists');
        }
    }
}

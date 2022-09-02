<?php

namespace App\Http\Controllers;

use App\Models\popularExperience;
use App\Models\program;
use App\Models\specialOffer;
use App\Models\departures;
use App\Models\title;

use Illuminate\Http\Request;

class saleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $datas = specialOffer::join('programs','programs.id','special_offers.tour_id')
        ->select('special_offers.id','special_offers.*','programs.tour_name','programs.days','programs.category','programs.type','programs.price','programs.id as program_id')
        ->get();
//dd($datas);
        $tours = program::get();
        return view('admins.Sales.specialOffer.index',compact('datas','tours'));
    }

//Edit Offer
      public function editOffer($id){
      
           $datas = specialOffer::join('programs','programs.id','special_offers.tour_id')
            ->where('special_offers.id',$id)
          ->select('special_offers.id','special_offers.*','programs.tour_name','programs.days','programs.category','programs.type','programs.price','programs.id as program_id')
          ->get()->first();
         //dd($datas);
        $tours = program::get();
        return view('admins.Sales.specialOffer.editOffer',compact('datas','tours'));
    }
/**
 * Popular experience logics
 */
 public function popularExperience()
    {
        $datas = popularExperience::join('programs','programs.id','popular_experiences.tour_id')
        ->get();
        $tours = program::get();
               return view('admins.Sales.popular-experience.popular-experience',compact('datas','tours'));
    }

 //Edit Offer
      public function editPopularExperience($id){
       
        $datas = popularExperience::join('programs','programs.id','popular_experiences.tour_id')
        ->where('popular_experiences.tour_id',$id)
        ->get()->first();
        // dd($datas);
        $tours = program::get();
               return view('admins.Sales.popular-experience.editPopularExperience',compact('datas','tours'));
    }

    //Update PopularExperience
      public function updatePopularExperience($id){               
        $popularExperience = popularExperience::UpdateorCreate(

                ['tour_id'=>request('tour_id')],
                ['descriptions'=>request('descriptions')      
              
            ]
            );     
    return redirect()->route('popularExperience')->with('success','Tour Summary Cost created successful');
    }
    
    public function offers()
    {
      $offers_private = specialOffer::join('programs','programs.id','special_offers.tour_id')
        ->join('attachments','attachments.destination_id','programs.id')
        ->select('special_offers.id','special_offers.*','programs.tour_name','programs.days','programs.category','programs.type',
        'programs.price','programs.id as program_id','programs.physical_rating','attachments.attachment')
        ->where('special_offers.status','Active')
         ->where('programs.category','Private')
        ->where('attachments.type','Programs')
        ->groupby('attachments.destination_id')
        ->get();
        
        $offers_group = specialOffer::join('programs','programs.id','special_offers.tour_id')
        ->join('attachments','attachments.destination_id','programs.id')
         ->join('departures','departures.tour_id','programs.id')
        ->where('special_offers.status','Active')
         ->where('programs.category','Group')
        ->where('attachments.type','Programs')
        ->groupby('attachments.destination_id')
        ->get();
       
        $PostcategoryImage = title::where('title','Special Offers')
          ->first();


        return view('website.offers.offers',compact('offers_group','offers_private','PostcategoryImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.Sales.add',compact('tours'));
    }

    /**
     * Store a newly created resource in storage.
     
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //dd('sale');
        if(request('sales_header')){
        $tours = program::where('id',request('tour_id'))->first();
        $originalPrice = $tours->price;
        $discount= request('discount');
        $newprice = $originalPrice - $discount;


    //Update specialOffer deadline using the departures startdate day 1 before
       $departures=departures::where('status','Active')
       ->where('tour_id',request('tour_id'))->first();     

       if($departures!=null)
       {
        $value=1;
        $start_date=$departures->start_date;
       $end_date=date('Y-m-d', strtotime($start_date. ' - '.$value.' days'));
        $_date=$end_date;
       }
       else
       {
        $_date=request('offer_deadline');
       }
      
     
        $store = specialOffer::UpdateorCreate(

                ['tour_id'=>request('tour_id')],
                ['discount'=>$discount,
                'new_price'=>$newprice,
                'save'=>$discount,
                'sales_header'=>request('sales_header'),
                'offer_deadline'=>$_date,
                'status'=>'Active'
            ]
            );
        }
        if(request('tour_id')){
            if( popularExperience::where('tour_id',request('tour_id'))->exists()){
                return redirect()->back()->with('error','Sorry!... This category already exists');
            }
            else{
            if(request('attachment')){
                     // Get filename with extension
                     $fileNameWithExt = request('attachment')->getClientOriginalName();
                     // Just Filename
                     $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                     // Get just Extension
                     $extension = request('attachment')->getClientOriginalExtension();
                     //Filename to store
                     $imageToStore = $filename.'_'.time().'.'.$extension;
                     //upload the image
                     $path = request('attachment')->storeAs('public/uploads/', $imageToStore);
                }
                else{
                    $imageToStore = "No Image";
                }
                $savenow = popularExperience::UpdateOrCreate(
                    [
                        'tour_id'=>request('tour_id'),
                        'descriptions'=>request('descriptions')                    
                    ]);
                    
        }
    }
            return redirect()->back()->with('success','Offer created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = specialOffer::where('id',$id)->get();
        return $datas;
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
  
    $tours = program::where('id',request('tour_id'))->first();
        $originalPrice = $tours->price;
        $discount= request('discount');
        $newprice = $originalPrice - $discount;


    //Update specialOffer deadline using the departures startdate day 1 before
       $departures=departures::where('status','Active')
       ->where('tour_id',request('tour_id'))->first();     

       if($departures!=null)
       {
        $value=1;
        $start_date=$departures->start_date;
       $end_date=date('Y-m-d', strtotime($start_date. ' - '.$value.' days'));
        $_date=$end_date;
       }
       else
       {
        $_date=request('offer_deadline');
       }

          $toupdate = specialOffer::where('id',$id)->update([
               'discount'=>$discount,
                'new_price'=>$newprice,
                'save'=>$discount,
                'sales_header'=>request('sales_header'),
                'offer_deadline'=>$_date,
                'status'=>'Active'
        ]);

          return redirect()->route('sales.index')->with('success','Offer Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = specialOffer::where('id',$id)->first();
        if($delete->delete()){
         return redirect()->back()->with('success','Special Offer'." ".$delete->destination_name." ".$delete->category.' removed successfully');
        }    
        else{
            return redirect()->back()->with('error','Special Offer'." ".$delete->destination_name." ". $delete->category.' not exists');
        }
    }
}

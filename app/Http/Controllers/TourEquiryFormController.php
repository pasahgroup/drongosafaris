<?php

namespace App\Http\Controllers;
use App\Models\program;
use App\Models\TourEquiryForm;
use App\Models\tourEquerySocialMedia;
use App\Models\socialmedia;
use App\Models\Invoice;
use App\Models\Tourcostsummary;
use App\Models\departures;

use DB;
use DateTime;
use Illuminate\Http\Request;

class TourEquiryFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
       {

       $socialmedia = socialmedia::get();
       return view('website.tour.tourEnquiryForm',compact('socialmedia'));
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

      public function bookingTrip()
    {
        return view('website.payments.bookingTrip');
    }


      public function viewTrip(Request $request)    {

              //Verify if the pin exists
           $pin=request('pin');        

            $trip = TourEquiryForm::
            where('tour_equiry_forms.pin',$pin)
           ->where('tour_equiry_forms.status','Active')->first();        
            //dd($trip);

           if($trip==null)
           {
            return 'Enter your PIN No Or Your PIN No is Expired Or Not Exists';
           }
           else
           {
           // $id=$trip->tour_id;
             $id=$trip->id;         
            // dd($id);
        if($trip->tour_type=='Private')
        {
        return redirect()->route('privateTourSumary',$id)->with('success','Tour Summary Cost created successful');
        }
        else if ($trip->tour_type=='Group') {
            # code... 
              return redirect()->route('groupTourSumary',$id)->with('success','Tour Summary Cost created successful');  
        }else
        {
         return 'Tour category was not specified...!';      
        }       
     }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $tour_date=request('tour_date'); 
         $yearM =date('Y-m-d', strtotime($tour_date)); 
         
          $departurePrice=departures::where('tour_id',request('tour_id'))
          ->where('status','Active')
          ->where('start_date',$yearM)
           ->first();
           if($departurePrice !=null)
           {
           $dapart_id=$departurePrice->id;
           $pricef=$departurePrice->price;
            }
            else{
                 $pricef=request('unit_price');
                 $dapart_id=0;
            } 

        // if($departurePrice->price<=0)
        //   {
        
        //  }
       

        $pin = rand(111111, 999999);
        $hear_from = request('hear');        
    
        $tour_name=request('tour_name');
        $acc=request('accomodation');
        $adults=request('adults');
        $addon_price=request('addon');

      $Tourcostsummary = Tourcostsummary::
        where('program',$tour_name)
         ->select('tourcostsummaries.*')
        ->where('status',$acc)
        ->get();    

         if($Tourcostsummary == "[]"){
            $unit_price=$pricef;         
            $teens_cost=($unit_price * 0.75)*request('teens');          
            $children_cost=($unit_price * 0.4)*request('children');   

            $total_price=($unit_price * $adults)+$teens_cost + $children_cost;
         // dd($total_price);
            $total_addon_price=($addon_price*0.75)*request('teens') + ($addon_price * $adults+($addon_price*0.4)*request('children'));
            
            $total_cost=$total_price + $total_addon_price;
         }
         else
         {
            //Extraction of Cost Summary values from Array List
    foreach($Tourcostsummary as $costsummary){
        }

            if($adults==2)
            {
                $unit_price=$costsummary->twopax;                        
             }
            elseif ($adults==3)
            {
              $unit_price=$costsummary->threepax;
            
            }elseif ($adults==4)
             {
              $unit_price=$costsummary->fourpax;
            }elseif ($adults==5) {
             $unit_price=$costsummary->fivepax;
            }elseif ($adults==6) {
            $unit_price=$costsummary->sixpax;
            }
            else
            {
             $unit_price=$costsummary->sixpax;
            }
         
            $teens_cost=($unit_price * 0.75)*request('teens');          
            $children_cost=($unit_price * 0.4)*request('children');   

            $total_price=($unit_price * $adults)+$teens_cost + $children_cost;
         // dd($total_price);
            $total_addon_price=($addon_price*0.75)*request('teens') + ($addon_price * $adults+($addon_price*0.4)*request('children'));
            
            $total_cost=$total_price + $total_addon_price;
         }

        $tour_costsummary = TourEquiryForm::create([
        'first_name'=>request('first_name'),
        'last_name'=>request('last_name'),
        'email'=>request('email'),
        'phone'=>request('phone'),
        'country'=>request('country'),
        'tour_id'=>request('tour_id'),
        'depart_id'=>$dapart_id,

        'tour_type'=>request('tour_type'),
        'accommodation'=>request('accomodation'),

          'adults'=>request('adults'),
           'teens'=>request('teens'),
            'children'=>request('children'),
             'tour_date'=>$yearM,
              'travel_date'=>request('travel_date'),

              'pin'=> $pin,
               'status'=>'Active',
             'additional_information'=>request('additional_information'),
              'hear_about_us'=>request('hear_about_us'),

        'user_id'=>auth()->id()
        ]);

     
        $tourcostsummary = Invoice::create([
        'customer_id'=>$tour_costsummary->id,
        'tour_id'=>request('tour_id'),
        'unit_price'=> $unit_price,
        'total_price'=>$total_price,
        'addon_price'=>$addon_price,
         'total_addon_price'=>$total_addon_price,
         'total_cost'=>$total_cost,
        'currency'=>request('currency')
        ]);

//HEAR FROM
        if($hear_from!=null)
        {
        foreach ($hear_from as $hears) {
        $tourhearfrom = tourEquerySocialMedia::create([
        'tour_equery_id'=>$tour_costsummary->id,
        'social_name'=>$hears
        ]);
        }
      }
        return redirect()->back()->with('success','Tour Summary Cost created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TourEquiryFrom  $tourEquiryFrom
     * @return \Illuminate\Http\Response
     */

      public function customers()
    {
      $customers = TourEquiryForm::join('invoices','invoices.customer_id','tour_equiry_forms.id')
      ->where('tour_equiry_forms.status','Active')
      ->orderby('invoices.id','desc')
      ->get();
     // dd($customers);
       return view('admins.customers.customers',compact('customers'));
    }

    public function activeGroupTrip()
    {
      $groupTrip2 = TourEquiryForm::join('invoices','invoices.customer_id','tour_equiry_forms.id')
      ->where('tour_equiry_forms.tour_type','Group')
      ->where('tour_equiry_forms.status','Active')
      ->orderby('invoices.id','desc')
      ->get();
  

$groupTrip=  DB::select("select sum(t1.adults)adults,sum(t1.teens)teens,sum(t1.children)children,tour_type,format(sum(i.total_price),2)tour_cost,format(sum(i.total_addon_price),2)total_Addon_cost,format(sum(i.total_cost),2)total_cost,format(sum(i.total_amount_paid),2)amount_paid,format(sum(i.amount_remain),2)amount_remain from tour_equiry_forms t1,invoices i where t1.id=i.customer_id and t1.status='Active' and t1.tour_type='Group' group by t1.tour_id");
//dd($groupTrip);
    return view('admins.activeGroupTrip.activeGroupTrip',compact('groupTrip'));
    }


    public function show($id)
    {

        $programc = program::
           join('itineraries','itineraries.program_id','programs.id')
       // ->join('attachments','programs.id','attachments.destination_id')
         ->where('programs.id',$id)->first();

      $socialmedia = socialmedia::get();
       return view('website.tour.tourEnquiryForm',compact('socialmedia','programc'));
       // return redirect()->back()->with('success','Tour Summary Cost created successful');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TourEquiryFrom  $tourEquiryFrom
     * @return \Illuminate\Http\Response
     */
    public function edit(TourEquiryFrom $tourEquiryFrom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TourEquiryFrom  $tourEquiryFrom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourEquiryFrom $tourEquiryFrom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TourEquiryFrom  $tourEquiryFrom
     * @return \Illuminate\Http\Response
     */
    public function destroy(TourEquiryFrom $tourEquiryFrom)
    {
        //
    }
}

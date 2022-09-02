<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\Tour;
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
use App\Models\departures;
use App\Models\invoice;
use App\Models\tailorMade;
use App\Models\TourEquiryForm;

use Illuminate\Http\Request;

class PaymentController extends Controller
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

  
  public function privateTourSumary($cust_id)
    {      

      //Get customer details
        $cust=invoice::where('customer_id',$cust_id)->first();
        $id=$cust->tour_id;   

         $discounts=specialOffer::where('tour_id',$id)->first();
         $tourInvoice=invoice::where('tour_id',$id)->first();

        $tour_addon='Programs';
        $programs = program::
           join('itineraries','itineraries.program_id','programs.id')
         ->join('attachments','programs.id','attachments.destination_id')
        ->join('invoices','programs.id','invoices.tour_id')
         ->where('attachments.type','Programs')
         ->where('itineraries.tour_addon','programs')
         ->where('invoices.customer_id',$cust->customer_id)
         ->where('programs.id',$id) ->first();


       $datas = itinerary::join('itinerary_days','itineraries.id','itinerary_days.itinerary_id')
        ->join('accommodations','accommodations.id','itinerary_days.accommodation_id')
        ->join('destinations','destinations.id','itinerary_days.destination_id')
        ->join('programs','programs.id','itineraries.program_id')
        ->join('attachments','accommodations.id','attachments.destination_id')
        
        ->orderby('itinerary_days.id','ASC')
        ->where('itineraries.tour_addon','programs')
        ->where('itineraries.program_id',$id)
        ->where('attachments.type','Accommodation')
        ->select('accommodations.accommodation_name','accommodations.accommodation_descriptions','accommodations.category',
        'destinations.destination_name','itineraries.*','programs.tour_name','itinerary_days.*','attachments.attachment')
        ->get();

         if($datas == "[]"){
            $programs = program::where('id',$id)->first();
            $accommodations = accommodation::get();
            $destinations = destination::get();
            return view('admins.itinerary.add',compact('programs','accommodations','destinations','tour_addon'));
        };
       
       $basic = Tourcostsummary::
       where('status','Basic')
       ->get();
        $comfort = Tourcostsummary::
       where('status','Comfort')
       ->get();
        $luxury = Tourcostsummary::
       where('status','Deluxe')
       ->get();

        return view('website.payments.privatePaySummary',compact('datas','id','programs','basic','comfort','luxury','discounts','tourInvoice'));
    }

 //payment for scheduled group tours
      public function groupTourSumary($id)
    {
       $cust_id=$id;
       $cust=invoice::where('customer_id',$cust_id)->first();
       // dd($cust);
        $id=$cust->tour_id;   

          $discounts=specialOffer::where('tour_id',$id)->first();
             $tourInvoice=invoice::where('tour_id',$id)->first();

          $tour_addon='Programs';
           $programs = program::
           join('itineraries','itineraries.program_id','programs.id')
           ->join('attachments','attachments.destination_id','programs.id')
         ->join('invoices','programs.id','invoices.tour_id')
            ->where('attachments.type','Programs')
           ->where('itineraries.tour_addon','programs')
           ->where('invoices.customer_id',$cust->customer_id)
          ->where('programs.id',$id)->first();
      
           if($programs ==null){
              $programs = program::
              join('invoices','programs.id','invoices.tour_id')
              ->where('invoices.customer_id',$cust->customer_id)
              ->where('programs.id',$id)->first();
                         }

         $datas = itinerary::join('itinerary_days','itineraries.id','itinerary_days.itinerary_id')

        ->join('accommodations','accommodations.id','itinerary_days.accommodation_id')
        ->join('destinations','destinations.id','itinerary_days.destination_id')
        ->join('programs','programs.id','itineraries.program_id')
        ->join('attachments','attachments.destination_id','accommodations.id')
        ->orderby('itinerary_days.id','ASC')
        ->where('itineraries.tour_addon','programs')
        ->where('itineraries.program_id',$id)
        ->where('attachments.type','Accommodation')
        ->select('accommodations.accommodation_name','attachments.attachment','accommodations.accommodation_descriptions','accommodations.category','destinations.destination_name','itineraries.*','programs.tour_name','itinerary_days.*')
        ->get();
      
         if($datas == "[]"){
            $programs = program::
            join('attachments','attachments.destination_id','programs.id')
           ->where('attachments.type','Programs')
           ->where('programs.id',$id)->first();
          
            $accommodations = accommodation::get();
            $destinations = destination::get();
            return view('admins.itinerary.add',compact('programs','accommodations','destinations','tour_addon'));
             };
  

        $basic = departures::join('programs','programs.id','departures.tour_id')
        ->join('attachments','attachments.destination_id','programs.id')
        ->select('departures.*','programs.*','attachments.attachment')
        ->where('departures.status','Active')
        ->where('attachments.type','Programs')
         ->where('departures.tour_id',$id)
        ->get();
        //dd($basic);

        return view('website.payments.groupPaySummary',compact('datas','id','programs','basic','discounts','tourInvoice'));
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


 public function privatePay(Request $request,$z)
    {
     
      $tailorCustomer = invoice::
        where('id',$z)
        ->first();

  if($tailorCustomer->payee_status!='Paid')
   {
        $tourcostsummary = payment::create([
        'customer_id'=>$tailorCustomer->id,
        'tour_id'=>$tailorCustomer->tour_id,
        'amount_paid'=>request('amount'),
         'payee_date'=>request('payee_date')

        ]);

      $toupdate = invoice::where('id',$z)->update([
            'total_amount_paid'=>request('amount') +$tailorCustomer->total_amount_paid,
            'amount_remain'=>$tailorCustomer->total_cost -($tailorCustomer->total_amount_paid+request('amount')),
            //'physical_rating'=>request('physical_rating')
        ]);

         $tailorCustomerf = invoice::
        where('id',$z)
        ->first();

           if($tailorCustomerf->amount_remain<=0.0)
           {
      $toupdatef = invoice::where('id',$z)->update([
            'payee_status'=>'Paid'
        ]);

           return redirect()->back()->with('success','Itinerary created successful');
           }
   else
   {
     $toupdatef = invoice::where('id',$z)->update([
            'payee_status'=>'In due'
        ]);  
    return redirect()->back()->with('success','Itinerary created successful');
   }

}
else
{
    return 'The Invoice is alredy paid...!';
}
}



 public function groupPay(Request $request,$z)
    {
     
      $tailorCustomer = invoice::
        where('id',$z)
        ->first();

        //dd($tailorCustomer);
  if($tailorCustomer->payee_status!='Paid')
   {
        $tourcostsummary = payment::create([
        'customer_id'=>$tailorCustomer->id,
        'tour_id'=>$tailorCustomer->tour_id,
        'amount_paid'=>request('amount'),
         'payee_date'=>request('payee_date')

        ]);


      $toupdate = invoice::where('id',$z)->update([
            'total_amount_paid'=>request('amount') +$tailorCustomer->total_amount_paid,
            'amount_remain'=>$tailorCustomer->total_cost -($tailorCustomer->total_amount_paid+request('amount')),
            //'physical_rating'=>request('physical_rating')
        ]);

         $tailorCustomerf = invoice::
        where('id',$z)
        ->first();

           if($tailorCustomerf->amount_remain<=0.0)
           {
      $toupdatef = invoice::where('id',$z)->update([
            'payee_status'=>'Paid'
        ]);

        return redirect()->back()->with('success','Itinerary created successful');
           }
   else
   {
     $toupdatef = invoice::where('id',$z)->update([
            'payee_status'=>'In due'
        ]);  

        return redirect()->back()->with('success','Itinerary created successful');
   }

}
else
{
    return 'The Invoice is alredy paid...!';
}
        
//return redirect()->back()->with('success','Itinerary created successful');
}

  public function tailorPay(Request $request,$z)
    {

      $tailorCustomer = tailorMade::
        where('id',$z)
        ->first();
    //dd($tailorCustomer);
  if($tailorCustomer->payee_status!='Paid')
   {
        $tourcostsummary = payment::create([
            'customer_id'=>$tailorCustomer->id,
            'tour_id'=>$tailorCustomer->id,
        'amount_paid'=>request('amount'),
         'payee_date'=>request('payee_date')

        ]);

      $toupdate = tailorMade::where('id',$z)->update([
            'total_amount_paid'=>request('amount') +$tailorCustomer->total_amount_paid,
            'amount_remain'=>$tailorCustomer->calculated_cost -($tailorCustomer->total_amount_paid+request('amount')),
            //'physical_rating'=>request('physical_rating')
        ]);

         $tailorCustomerf = tailorMade::
        where('id',$z)
        ->first();

           if($tailorCustomerf->amount_remain<=0.0)
           {
     $toupdatef = tailorMade::where('id',$z)->update([
            'payee_status'=>'Paid'
        ]);
          //return redirect()->back()->with('success','Itinerary created successful');
           }
   else
   {
     $toupdatef = tailorMade::where('id',$z)->update([
            'payee_status'=>'In due'
        ]);
          return redirect()->back()->with('success','Itinerary created successful');
   }

}
else
{
    return 'The Invoice is alredy paid...!';
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment $payment)
    {
        //
    }
}

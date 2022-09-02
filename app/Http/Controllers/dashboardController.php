<?php

namespace App\Http\Controllers;
use App\Models\Agent;
use App\Models\tailorMade;
use App\Models\TourEquiryForm;
use App\Models\partner;
use App\Models\tourGuide;
use App\Models\contacts;
use App\Models\enquiry;
use DB;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=TourEquiryForm::where('status','Active')->count();
        $agents=Agent::where('status','Active')->count();
         $partiners=partner::where('status','Active')->count();
         $tailorMades=tailorMade::where('status','Active')->count();
        $tourGuides=tourGuide::where('status','Active')->count();

   $contacts=contacts::where('status','Active')->count();
$enquiries=enquiry::where('status','Active')->count();


  $activeGroupTrip = TourEquiryForm::join('invoices','tour_equiry_forms.id','invoices.customer_id')
         ->where('tour_equiry_forms.status','Active')
        ->where('tour_equiry_forms.tour_type','Group')
        ->count();

        return view('admins.Dashboard.index',compact('agents','tailorMades','customers','partiners','tourGuides','contacts','enquiries','activeGroupTrip'));
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

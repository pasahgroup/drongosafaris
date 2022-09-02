<?php

namespace App\Http\Controllers;

use App\Models\partner;
use App\Models\socialmedia;
use App\Models\tailorMade;
use App\Models\tourEquerySocialMedia;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datas = partner::get();
        return view('admins.partners.index',compact('datas'));
    }


public function NewPartner()
    {
       $socialmedias = socialmedia::get();
       $tailorMades = tailorMade::get();
       return view('website.agents.partner',compact('tailorMades','socialmedias'));
   
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
        $hear_from = request('hear');
     
      $pin=rand(1111111, 9999999);
   
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
                     $path = $attached->storeAs('public/agents/', $imageToStore);

        $agents = partner::UpdateOrCreate([
        'first_name'=>request('first_name'),
        'last_name'=>request('last_name'),
        'nationality'=>request('nationality'),
        'email'=>request('email'),
        'phone'=>request('phone'),       
        'language'=>request('language'),
        'photo'=>$imageToStore,
       'pin'=>$pin,
       'offer'=>request('offer'),
       'status'=>'Active',
       'commisioner_desc'=>request('additional_information'),
        'hear_about_us'=>request('hear_about_us'),
        ]);
        }

        if($hear_from !=null)
     {
        foreach ($hear_from as $hears) {
        $tourhearfrom = tourEquerySocialMedia::create([
        'tour_equery_id'=>$agents->id,
        'social_name'=>$hears,
        'from_name'=>'Partners'        
        ]);
        }  
     }
    }
    else
    {
       return redirect()->back()->with('info','Photo is not Set');  
    }
     return redirect()->back()->with('success','Partner Successfully Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // dd($id);
        $delete = partner::where('id',$id)->first();
        if($delete->delete()){
         return redirect()->back()->with('success','Partner' .'".$delete->first_name."'. '".$delete->last_name."'.' removed successfully');
        }    
        else{
            return redirect()->back()->with('error','Partner' . '".$delete->first_name."'. '".$delete->last_name."'.' not exists');
        }
    }
}

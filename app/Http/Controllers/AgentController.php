<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\socialmedia;
use App\Models\tailorMade;
use App\Models\tourEquerySocialMedia;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Agent::get();
        return view('admins.agents.index',compact('datas'));
    }


  public function NewAgent()
    {
       $socialmedias = socialmedia::get();
       $tailorMades = tailorMade::get();
       return view('website.agents.agents',compact('tailorMades','socialmedias'));
   
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
      $pin=rand(11111111, 99999999);
   
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

        $agents = Agent::UpdateOrCreate([
        'first_name'=>request('first_name'),
        'last_name'=>request('last_name'),
        'nationality'=>request('nationality'),
        'email'=>request('email'),
        'phone'=>request('phone'),       
        'language'=>request('language'),
        'photo'=>$imageToStore,
       'pin'=>$pin,
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
        'from_name'=>'Agents'        
        ]);
        } 
     }
    }
    else
    {
       return redirect()->back()->with('info','Photo is not Set');  
    }

   // return('Successful submitted');
      return redirect()->back()->with('success','Successful submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    // dd($id);
     $datas = Agent::where('id',$id)->first();
        return view('admins.agents.editAgent',compact('datas','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Agent::where('id',$id)->first();
        if($delete->delete()){
         return redirect()->back()->with('success','Agent' .'".$delete->first_name."'. '".$delete->last_name."'.' removed successfully');
        }    
        else{
            return redirect()->back()->with('error','Agent'. '".$delete->first_name."'. '".$delete->last_name."'.' not exists');
        }
    }
}

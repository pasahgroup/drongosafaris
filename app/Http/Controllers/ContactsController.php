<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $contacts=contacts::where('status','Active')
     ->get();     
     $status=contacts::distinct()->get(['status']);
     return view('admins.contacts.contactsComment',compact('contacts','status'));
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
        $contacts = contacts::create([
        'full_name'=>request('full_name'),
        'subject'=>request('subject'),
        'comment'=>request('comment'),
        'phone'=>request('phone'), 
        'email'=>request('email')        
        ]);
          return redirect()->route('contact')->with('success','Tour Summary Cost created successful');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(contacts $contacts,$id)
    {
      
 $status=contacts::where('id',$id)
 ->first();
//dd($status->status);
if($status->status=="Active")
{
$status="Inactive";
}
else
{
$status="Active";
}

        $contacts = contacts::where('id',$id)
               ->update([
                'status'=>$status
              ]);
return redirect()->route('contacts.index')->with('success','Successful updated!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(contacts $contacts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contacts $contacts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(contacts $contacts)
    {
        //
    }
}

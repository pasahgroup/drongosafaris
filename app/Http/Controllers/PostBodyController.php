<?php

namespace App\Http\Controllers;

use App\Models\PostBody;
use App\Models\program;
use App\Models\Post;
use App\Models\title;
use App\Models\attachment;
use Illuminate\Http\Request;

class PostBodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $Postcategory = PostBody::where('category','!=','Welcome message')
         ->get();

     $contacts = PostBody::where('category','=','Contact')
     ->get(); 
    
     $others = PostBody::where('category','!=','Contact')
    ->where('category','!=','Welcome message')
    ->where('category','!=','About us')
     ->get();   
    
     return view('admins.coa.contact',compact('Postcategory','contacts'));
    }


   //Create coa
     public function coa()
         {
       $Postcategory = PostBody::get();
         $aboutUs = PostBody::where('category','About us')
         ->get();
         return view('admins.coa.aboutus',compact('Postcategory','aboutUs'));
     }


   public function welcomeMessage()
    {
     $Postcategory = PostBody::where('category','Welcome message')
     ->get();
     return view('admins.themes.welcomeIntro',compact('Postcategory'));
    }

   
    //What We Offer,Client view
     public function whatWeOfferClient()
    {     
          $Postcategory = PostBody::join('attachments','attachments.destination_id','post_bodies.id')
        ->where('attachments.type','Posts')
        ->where('post_bodies.category','What We Offer')
        ->get();
        // dd($Postcategory);
         return view('website.whatWeOffer.whatWeOfferClient',compact('Postcategory'));
         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    {
        return view('admins.coa.addContact');
     }

   public function createAbout()    {
        return view('admins.coa.addAboutus');
     }

   //Create Message intro
     public function createMessage()
    {
        $Postcategory = Post::get();
        return view('admins.themes.addMessage',compact('Postcategory'));
     }

     //Edit Message intro
      public function editMessage()
    {
        $messageBody = PostBody::where('category','Welcome message')
        ->get()->first();
        return view('admins.themes.editMessage',compact('messageBody'));
     }

      //Edit Others
      public function editOthers($id)
    {
      $others = PostBody::where('id','=',$id)    
     ->get()->first();
     
    return view('admins.posts.editOthers',compact('others'));
     }
      //Edit Contacts
      public function editContact()
    {
        $contactsBody = PostBody::where('category','Contact')
        ->get()->first();
        return view('admins.coa.editContact',compact('contactsBody'));
     }

        //Edit About us
     public function editAboutus()
    {
        
       $aboutUsBody = PostBody::where('category','About us')
        ->get()->first();
        return view('admins.coa.editAboutus',compact('aboutUsBody'));
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
          /// dd(request('post_category'));
            $program =  PostBody::UpdateOrCreate(
            ['category'=>request('post_category')],                
                
            ['title'=>request('title'),
              'body'=>request('post_body'),  
                'introduction'=>request('introduction'),
                  'mission'=>request('mission'),
                 'vission'=>request('vission'),
                  'objectives'=>request('objectives'),

                   'address'=>request('address'),
                  'phone'=>request('phone'),
                    'email'=>request('email'),
                      'website'=>request('website'),

            'user_id'=>auth()->id()
            ]);
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
            ->where('type','Posts')
            ->get()->first();
           
             if($id !=null)
             {
            $toupdate = attachment::where('destination_id',$program->id)
             ->where('type','Posts')
             ->update([
            'attachment'=>$imageToStore
        ]);
           }else
           {
           attachment::Create(
                [
                'destination_id'=>$program->id,
                'attachment'=>$imageToStore,
                'type'=>'Posts'
                ]
                ); 
              
        }
           }
    }
      if($program->category=="Contact")
      {
      return redirect()->route('PostBody.index')->with('success','Created successfuly');
      }
      elseif($program->category=="Welcome message"){
        return redirect()->route('welcomeMessage')->with('success','Created successfuly');
      }
       else{
        return redirect()->route('coa')->with('success','Created successfuly');
      }
       
    }


//fucntion to retrieve the contacts information
    public function contact(PostBody $blogBody)
    {
       $contacts = PostBody::where('category','Contact')
       ->first();     
    return view('website.contacts.contact',compact('contacts'));
    }

//About us Method
    public function aboutus()
    {

        $PostcategoryImage = title::
        where('titles.title','About us')
        ->first();
        
         $aboutus = PostBody::where('category','About us')
         ->first();
           return view('website.aboutus.aboutus',compact('aboutus','PostcategoryImage'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogBody  $blogBody
     * @return \Illuminate\Http\Response
     */
    public function show(PostBody $blogBody)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogBody  $blogBody
     * @return \Illuminate\Http\Response
     */
    public function edit(PostBody $blogBody)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogBody  $blogBody
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostBody $blogBody)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogBody  $blogBody
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PostBody::where('id',$id);
        if($delete->delete()){
            return redirect()->back()->with('success','Inclusive removed successfully');
        }    
        else{
            return redirect()->back()->with('error','This Data is not exists');
        }
    }

    public function destroyContact($id)
    {
        //dd($id);
        $delete = PostBody::where('id',$id);
        if($delete->delete()){
            return redirect()->back()->with('success','Inclusive removed successfully');
        }    
        else{
            return redirect()->back()->with('error','This Data is not exists');
        }
    }

        public function destroyWelcomeMessage($id)
    {
        dd($id);
        $delete = PostBody::where('id',$id);
        if($delete->delete()){
            return redirect()->back()->with('success','Inclusive removed successfully');
        }    
        else{
            return redirect()->back()->with('error','This Data is not exists');
        }
    }
}

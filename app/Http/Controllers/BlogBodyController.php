<?php

namespace App\Http\Controllers;

use App\Models\BlogBody;
use App\Models\program;
use App\Models\Blog;
use App\Models\attachment;
use Illuminate\Http\Request;

class BlogBodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $Blogcategory = Blog::get();
        $Blogcategory = Blog::get();
    return view('admins.Blogs.BlogBody',compact('Blogcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Blogcategory = Blog::get();
        return view('admins.Blogs.add',compact('Blogcategory'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $program =  BlogBody::create(
            [
                'title'=>request('title'),
                'blog_category'=>request('blog_category'),
                'blog_body'=>request('blog_body'),               
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

            attachment::create(
                [
                'destination_id'=>$program->id,
                'attachment'=>$imageToStore,
                'type'=>'Blogs'
                ]
                );
        }
    }
        return redirect()->back()->with('success','Created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogBody  $blogBody
     * @return \Illuminate\Http\Response
     */
    public function show(BlogBody $blogBody)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogBody  $blogBody
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogBody $blogBody)
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
    public function update(Request $request, BlogBody $blogBody)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogBody  $blogBody
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogBody $blogBody)
    {
        //
    }
}

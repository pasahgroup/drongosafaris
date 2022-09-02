<?php

namespace App\Http\Controllers;
use App\Models\program;
use Illuminate\Http\Request;

class galleryController extends Controller
{
    //
  public function safarisGallery()
    {
        $title='Wildlife Safaris';
         $safaris = program::
  join('attachments','attachments.destination_id','programs.id')
  ->select('programs.*','attachments.attachment')
  ->where('programs.type','Wildlife Safaris')
  // ->orwhere('programs.type','Combined Tours')
  // ->orwhere('programs.type','Day Tours')
  // ->where('programs.popular_experience','Yes')
  ->where('attachments.type','Programs')
->get();
     return view('website.galleries.gallery',compact('safaris','title'));
    }



public function hikingGallery()
    {
         $title='Hiking & Trekking';
    $safaris = program::
  join('attachments','attachments.destination_id','programs.id')
  ->select('programs.*','attachments.attachment')
    ->where('attachments.type','Programs')
   ->where('programs.type','Hiking & Trekking')
    ->get();
     return view('website.galleries.gallery',compact('safaris','title'));
    }

public function beachGallery()
    {
         $title='Beach Holidays';
    $safaris = program::
  join('attachments','attachments.destination_id','programs.id')
  ->select('programs.*','attachments.attachment')
    ->where('attachments.type','Programs')
   ->where('programs.type','Beach Holidays')
    ->get();
     return view('website.galleries.gallery',compact('safaris','title'));
    }

public function groupGallery()
    {
         $title='Group Tours';
    $safaris = program::
  join('attachments','attachments.destination_id','programs.id')
  ->select('programs.*','attachments.attachment')
    ->where('attachments.type','Programs')
   ->where('programs.type','Combined Tours')
    ->get();
     return view('website.galleries.gallery',compact('safaris','title'));
    }
    public function dayGallery()
    {
         $title='Day Tours';
    $safaris = program::
  join('attachments','attachments.destination_id','programs.id')
  ->select('programs.*','attachments.attachment')
    ->where('attachments.type','Programs')
   ->where('programs.type','Day Tours')
    ->get();
     return view('website.galleries.gallery',compact('safaris','title'));
    }
    public function historicalGallery()
    {
    $title='Historical Sites';
    $safaris = program::
  join('attachments','programs.id','attachments.destination_id')
  ->select('programs.*','attachments.attachment')
   ->where('attachments.type','Programs')
   ->where('programs.type','Historical Site')
    ->get();
   // dd($safaris);
     return view('website.galleries.gallery',compact('safaris','title'));
    }

}

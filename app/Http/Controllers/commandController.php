<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class commandController extends Controller
{
   
public function index()
{   
    /* php artisan cache:clear */
     \Artisan::call('cache:clear');
    \Artisan::call('storage:link');
    dd('linked successfully');
}


}

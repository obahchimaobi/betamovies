<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //
    public function contact_us()
    {
        return view('pages.contact-us');
    }
}

<?php

namespace App\Http\Controllers\Year;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class YearController extends Controller
{
    //
    public function year()
    {
        return view('release-year.year');
    }
}

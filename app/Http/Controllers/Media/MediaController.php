<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    //
    public function movies()
    {
        return view('media.movies');
    }

    public function series()
    {
        return view('media.series');
    }

    public function new_releases()
    {
        return view('media.new-releases');
    }

    public function details()
    {
        return view('media.detail');
    }

    public function details2()
    {
        return view('media.detail2');
    }

    public function top_rated()
    {
        return view('media.top-rated');
    }

    public function year()
    {
        return view('media.year');
    }
}

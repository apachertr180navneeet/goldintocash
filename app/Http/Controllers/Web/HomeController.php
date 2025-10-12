<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('web.home.index');
    }


    public function about()
    {
        return view('web.home.about');
    }

    public function services()
    {
        return view('web.home.services');
    }


    public function contact()
    {
        return view('web.home.contact');
    }
}

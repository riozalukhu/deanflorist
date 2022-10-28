<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Gallery;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $galleries = Gallery::all();
        return view('pages.guest.home.main', compact('sliders', 'galleries'));
    }
}

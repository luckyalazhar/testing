<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $title = 'Home';
        return view('home', compact('title'));
    }
}

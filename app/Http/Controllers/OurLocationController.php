<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurLocationController extends Controller
{
    public function index()
    {
        return view('admin.our-location');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function resourcedetails(Request $request)
    {

        return view('home');
    }

}

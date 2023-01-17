<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashbaordController extends Controller
{
    public function dashbaord()
    {
        return view('frontend.profile.dashboard');
    }
}

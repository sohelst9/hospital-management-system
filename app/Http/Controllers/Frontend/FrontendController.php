<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Hospital;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        
        return view('frontend.index', [

        ]);
    }
}

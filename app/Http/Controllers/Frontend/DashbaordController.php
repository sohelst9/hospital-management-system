<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbaordController extends Controller
{
    public function dashbaord()
    {
        return view('frontend.profile.dashboard');
    }

    public function order_list()
    {
        $order_lists = Order::with('orderDetails')->where('user_id', Auth::user()->id)->get();
        return view('frontend.profile.order_list', compact('order_lists'));
    }
}

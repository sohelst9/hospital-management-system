<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderLabTestDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('labtest')->where('user_id', Auth::user()->id)->get();
        return view('frontend.profile.cart', compact('carts'));
    }
    public function store(Request $request)
    {
        //return $request->all();
        $user_id = Auth::user()->id;
        $same_info = Cart::where('user_id', $user_id)->where('labtest_id', $request->labtest_id);
        if ($same_info->exists()) {
            Cart::where('labtest_id', $request->labtest_id)->increment('quantity', $request->quantity);
            return back()->with('message', 'Cart Added');
        } else {
            Cart::create([
                'user_id' => $user_id,
                'hospital_id' => $request->hospital_id,
                'labtest_id' => $request->labtest_id,
                'quantity' => $request->quantity,
            ]);
            return back()->with('message', 'Cart Added');
        }
    }

    public function checkout(Request $request)
    {
        $user_id = Auth::user()->id;
        // // order table
        // $order_id = Order::insertGetId([
        //     'user_id' => $user_id,
        //     'hospital_id' => $user_id,
        //     'total' => $request->total,
        //     'payment_method' => $request->payment_method,
        //     'fname' => $request->firstName,
        //     'lname' => $request->lastName,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'labtest_id' => $cart->labtest_id,
        //     'quantity' => $cart->quantity,
        //     'created_at' => now(),

        // ]);

        // //order  details table
        $cart_items = Cart::where('user_id', $user_id)->get();
        foreach ($cart_items as $cart) {
            OrderLabTestDetails::insert([
            'user_id' => $user_id,
            'hospital_id' => $cart->hospital_id,
            'total' => $request->total,
            'payment_method' => $request->payment_method,
            'fname' => $request->firstName,
            'lname' => $request->lastName,
            'email' => $request->email,
            'address' => $request->address,
            'labtest_id' => $cart->labtest_id,
            'quantity' => $cart->quantity,
            'created_at' => now(),
            ]);
        }

        if ($request->payment_method == 1) {
            $cart_delete = Cart::where('user_id', $user_id);
            $cart_delete->delete();
        }
        return redirect()->route('frontend.dashboard')->with('message', 'Your Order Submitted Successfully');
    }
}

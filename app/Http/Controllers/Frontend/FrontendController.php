<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Hospital;
use App\Models\Admin\Labtest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::get();
        $labtests = Labtest::get();
        $categories = Category::get();
        return view('frontend.index', [
            'hospitals'=>$hospitals,
            'labtests'=>$labtests,
            'categories'=>$categories,
        ]);
    }

    public function category($id)
    {
        $hospital = Hospital::findOrFail($id);
        $categories = Category::where('hospital_id', $id)->get();
        return view('frontend.category', compact('categories', 'hospital'));
    }

    public function labtest($id)
    {
        $category = Category::findOrFail($id);
        $hospital = Category::with('hospital')->findOrFail($id);
        $labtests = Labtest::where('category_id', $id)->get();
        return view('frontend.labtest', compact('category', 'labtests', 'hospital'));
    }

    public function single_labtest($id)
    {
        $labtest = Labtest::findOrFail($id);
        $hospital = Labtest::with('hospital')->findOrFail($id);
        $category = Labtest::with('category')->findOrFail($id);
        $related_tests = Labtest::with('category')
        ->where('category_id', $labtest->category_id)
        ->where('id', '!=', $id)
        ->take(10)->get();;
        return view('frontend.single_labetest', compact('labtest', 'category', 'hospital', 'related_tests'));
    }

    // public function get_category(Request $request)
    // {
    //     $categories =  Category::where('hospital_id',$request->hospital_id)->get();
    //    $store =' <option value="">--Categories--</option>';
    //    foreach($categories as $category){
    //         $store .= '<option value="'.$category->id.'">'.$category->name.'</option>';
    //    }
    //    echo $store;
    // }

    public function appiontmant(Request $request)
    {

        Appointment::create([
            'user_id'=>Auth::user()->id,
            'hospital_id'=>$request->hospital,
            'category_id'=>$request->category,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'date'=>$request->date,
            'time_slot'=>$request->time,
        ]);

        return back()->with('message', 'Appointmennt Booked Successfully !');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function appointment_page()
    {
        $hospitals = Hospital::get();
        $categories = Category::get();
        return view('frontend.appointment_page', compact('hospitals', 'categories'));
    }

    public function all_labs_test()
    {

       // $hospital = Category::with('hospital')->findOrFail($id);
        $labtests = Labtest::with('hospital')->get();
        return view('frontend.all_labtest', compact('labtests'));
    }
}

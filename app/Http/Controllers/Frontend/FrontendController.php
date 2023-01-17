<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Hospital;
use App\Models\Admin\Labtest;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::get();
        $labtests = Labtest::get();
        return view('frontend.index', [
            'hospitals'=>$hospitals,
            'labtests'=>$labtests,
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
        $labtests = Labtest::where('category_id', $id)->get();
        return view('frontend.labtest', compact('category', 'labtests'));
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
}

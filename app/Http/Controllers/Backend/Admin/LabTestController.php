<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Hospital;
use App\Models\Admin\Labtest;
use App\Models\LabTestReport;
use App\Models\LabtestTime;
use App\Models\Order;
use App\Models\OrderLabTestDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LabTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_id = Auth::guard('admin')->user()->id;
        if (Auth::guard('admin')->user()->Is_admin == 1) {
            $labtests = Labtest::orderBy('id', 'DESC')->paginate(10);
        } else {
            $hospital = Hospital::where('admin_id', Auth::guard('admin')->user()->id)->first();
            $labtests = Labtest::where('hospital_id', $hospital->id)->orderBy('id', 'DESC')->paginate();
        }

        return view('admin.labtest.index', compact('labtests'));
    }


    public function create()
    {
        if (Auth::guard('admin')->user()->Is_admin == 1) {
            $hospitals = Hospital::get();
            $categories = Category::get();
        } else {
            $hospitals = Hospital::where('admin_id', Auth::guard('admin')->user()->id)->first();
            $categories = Category::where('hospital_id', $hospitals->id)->get();
        }

        return view('admin.labtest.create', compact('categories', 'hospitals'));
    }

    public function store(Request $request)
    {
        $admin_id = Auth::guard('admin')->user()->id;
        $request->validate([
            'name' => 'required',
            'hospital' => 'required',
            'category' => 'required',
            'price' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if ($request->hasfile('thumbnail')) {
            $file = $request->file('thumbnail')->getClientOriginalName();
            $filePath = public_path('uploads/labtest');
            $request->file('thumbnail')->move($filePath, $file);
        }
        Labtest::create([
            'hospital_id' => $request->hospital,
            'category_id' => $request->category,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'time_avilable' => $request->time_avilable,
            'price' => $request->price,
            'description' => $request->description,
            'thumbnail' => $file,
            'admin_id' => $admin_id
        ]);
        return redirect()->route('labtest.index')->with('success', 'New Lab Test Added !');
    }


    public function edit($id)
    {
        if (Auth::guard('admin')->user()->Is_admin == 1) {
            $labtest = Labtest::findOrFail($id);
            $categories = Category::get();
            $hospitals = Hospital::get();
            return view('admin.labtest.edit', compact('labtest', 'categories', 'hospitals'));
        } else {
            $labtest = Labtest::findOrFail($id);
            $categories = Category::where('admin_id', Auth::guard('admin')->user()->id)->get();
            return view('admin.labtest.edit', compact('labtest', 'categories'));
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required', 'category' => 'required', 'price' => 'required']);
        Labtest::find($id)->update([
            'hospital_id' => $request->hospital,
            'category_id' => $request->category,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'time_avilable' => $request->time_avilable,
            'price' => $request->price,
            'description' => $request->description
        ]);
        if ($request->hasfile('thumbnail')) {
            //delete old image
            $oldFile = Labtest::find($id)->thumbnail;
            $oldPath = 'uploads/labtest/' . $oldFile;
            File::delete(public_path($oldPath));
            // upload new image
            $file = $request->file('thumbnail');
            $ThumbnailImageName = $file->getClientOriginalName();
            $filePath = public_path('uploads/labtest');
            $request->file('thumbnail')->move($filePath, $ThumbnailImageName);
            Labtest::find($id)->update([
                'thumbnail' => $ThumbnailImageName
            ]);
        }
        return redirect()->route('labtest.index')->with('success', 'Labtest Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thumbnail_image = Labtest::find($id)->thumbnail;
        $path = 'uploads/labtest/' . $thumbnail_image;
        File::delete(public_path($path));
        $labtest = Labtest::FindOrFail($id)->delete();
        return redirect()->route('labtest.index')->with('success', 'Labtest Deleted Success !');
    }

    //labtest_report
    public function labtest_report()
    {
        if (Auth::guard('admin')->user()->Is_admin == 1) {
            $test_reports = OrderLabTestDetails::get();
        } else {
            $login_id = Auth::guard('admin')->user()->id;
            $hospital = Hospital::where('admin_id', $login_id)->first();
            $test_reports = OrderLabTestDetails::where('hospital_id', $hospital->id)->get();
        }

        return view('admin.labtestorder.index', compact('test_reports'));
    }

    public function report_create($id)
    {
        return view('admin.labtestorder.labtest_report_create', compact('id'));
    }

    public function test_status($test_id, $status)
    {
        $test_report = OrderLabTestDetails::where('id', $test_id)->first();
        OrderLabTestDetails::find($test_report->id)->update([
            'status' => $status
        ]);
        return back()->with('success', 'Change Status');
    }

    public function testreport_store(Request $request)
    {
        //return $request->all();
        if ($request->hasfile('report_file')) {
            $file = $request->file('report_file')->getClientOriginalName();
            $filePath = public_path('uploads/labtest_report');
            $request->file('report_file')->move($filePath, $file);
        }
        LabTestReport::create([
            'labtest_order_id' => $request->labtest_order_id,
            'title' => $request->title,
            'comment' => $request->comment,
            'report_file' => $file,
        ]);
        return redirect()->route('admin.labtest.report')->with('success', 'Labtest Report Added  !');
    }

    public function add_time($id)
    {
        return view('admin.labtestorder.labtest_add_time', compact('id'));
    }

    public function add_time_store(Request $request)
    {
       LabtestTime::create([
            'labtest_order_id'=>$request->labtest_order_id,
            'time'=>$request->time
       ]);
       return redirect()->route('admin.labtest.report')->with('success', 'Lab Test Time Addded !');
    }
}

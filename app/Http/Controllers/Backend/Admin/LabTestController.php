<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Labtest;
use Illuminate\Http\Request;
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
        $labtests = Labtest::paginate(10);
        return view('admin.labtest.index', compact('labtests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.labtest.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if ($request->hasfile('thumbnail')) {
            $file = $request->file('thumbnail')->getClientOriginalName();
            $filePath = public_path('uploads/labtest');
            $request->file('thumbnail')->move($filePath, $file);
        }
        Labtest::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
            'thumbnail' => $file,
        ]);
        return redirect()->route('labtest.index')->with('success', 'New Lab Test Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $labtest = Labtest::findOrFail($id);
        $categories = Category::all();
        return view('admin.labtest.edit', compact('labtest', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required', 'category'=>'required']);
        Labtest::find($id)->update([
            'category_id'=>$request->category,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name, '-'),
            'description'=>$request->description
        ]);
        if($request->hasfile('thumbnail')){
            //delete old image
            $oldFile = Labtest::find($id)->thumbnail;
            $oldPath ='uploads/labtest/'.$oldFile;
            File::delete(public_path($oldPath));
            // upload new image
            $file = $request->file('thumbnail');
            $ThumbnailImageName =$file->getClientOriginalName();
            $filePath =public_path('uploads/labtest');
            $request->file('thumbnail')->move($filePath,$ThumbnailImageName);
            Labtest::find($id)->update([
                'thumbnail'=>$ThumbnailImageName
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
        $path = 'uploads/labtest/'.$thumbnail_image;
        File::delete(public_path($path));
        $labtest = Labtest::FindOrFail($id)->delete();
        return redirect()->route('labtest.index')->with('success', 'Labtest Deleted Success !');
    }
}

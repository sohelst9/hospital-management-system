<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitals = Hospital::all();
        return view('admin.category.create', compact('hospitals'));
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
            'name'=>'required',
            'hospital'=>'required',
            'thumbnail'=>'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if($request->hasfile('thumbnail')){
            $file = $request->file('thumbnail')->getClientOriginalName();
            $filePath =public_path('uploads/category');
            $request->file('thumbnail')->move($filePath,$file);
        }
        Category::create([
            'hospital_id'=>$request->hospital,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name, '-'),
            'description'=>$request->description,
            'thumbnail'=>$file,
        ]);
        return redirect()->route('category.index')->with('success', 'New Category Added !');
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
        $hospitals = Hospital::all();
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category', 'hospitals'));
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
        $request->validate(['name'=>'required', 'hospital'=>'required',]);
        Category::find($id)->update([
            'hospital_id'=>$request->hospital,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name, '-'),
            'description'=>$request->description
        ]);
        if($request->hasfile('thumbnail')){
            //delete old image
            $oldFile = Category::find($id)->thumbnail;
            $oldPath ='uploads/category/'.$oldFile;
            File::delete(public_path($oldPath));
            // upload new image
            $file = $request->file('thumbnail');
            $ThumbnailImageName =$file->getClientOriginalName();
            $filePath =public_path('uploads/category');
            $request->file('thumbnail')->move($filePath,$ThumbnailImageName);
            Category::find($id)->update([
                'thumbnail'=>$ThumbnailImageName
            ]);
        }
        return redirect()->route('category.index')->with('success', 'Category Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thumbnail_image = Category::find($id)->thumbnail;
        $path = 'uploads/category/'.$thumbnail_image;
        File::delete(public_path($path));
        $category = Category::FindOrFail($id)->delete();
        return redirect()->route('category.index')->with('success', 'Category Deleted Success !');
    }
}

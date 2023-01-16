<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Hospital;
use App\Models\Admin\HospitalGalleryImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::paginate(10);
        return view('admin.hospital.index', compact('hospitals'));
    }

    public function create()
    {
        return view('admin.hospital.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'thumbnail'=>'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if($request->hasfile('thumbnail')){
            $file = $request->file('thumbnail')->getClientOriginalName();
            $filePath =public_path('uploads/hospital/thumbnail');
            $request->file('thumbnail')->move($filePath,$file);
        }
       Hospital::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name, '-'),
            'sub_title'=>$request->subtitle,
            'description'=>$request->description,
            'thumbnail'=>$file,
        ]);
        return redirect()->route('hospital.index')->with('success', 'New Hospital Added !');
    }

    public function edit($id)
    {
        $hospital = Hospital::findOrFail($id);
        return view('admin.hospital.edit', compact('hospital'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required']);
        Hospital::find($id)->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name, '-'),
            'sub_title'=>$request->subtitle,
            'description'=>$request->description
        ]);
        if($request->hasfile('thumbnail')){
            //delete old image
            $oldFile = Hospital::find($id)->thumbnail;
            $oldPath ='uploads/hospital/thumbnail/'.$oldFile;
            File::delete(public_path($oldPath));
            // upload new image
            $file = $request->file('thumbnail');
            $ThumbnailImageName =$file->getClientOriginalName();
            $filePath =public_path('uploads/hospital/thumbnail');
            $request->file('thumbnail')->move($filePath,$ThumbnailImageName);
            Hospital::find($id)->update([
                'thumbnail'=>$ThumbnailImageName
            ]);
        }
        return redirect()->route('hospital.index')->with('success', 'Hospital Updated !');
    }

    public function destroy($id)
    {
        $thumbnail_image = Hospital::find($id)->thumbnail;
        $path = 'uploads/hospital/thumbnail/'.$thumbnail_image;
        File::delete(public_path($path));
        $hospital = Hospital::FindOrFail($id)->delete();
        return redirect()->route('hospital.index')->with('success', 'Hospital Deleted Success !');
    }


}

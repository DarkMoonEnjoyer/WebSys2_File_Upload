<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $images = Photo::all();
        $images = DB::table('photos')->paginate(15);
        return view('upload', compact('images'));
    }
    public function storeSingle(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $image = $request->file('image');
        $name = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('images'), $name);
        Photo::create(['image' => $name]);
        return back()->with('success', 'Single image uploaded successfully!');
    }
    public function storeMultiple(Request $request)
    {
    $request->validate([
        'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);
    foreach ($request->file('images') as $image) {
        $name = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('images'), $name);
        Photo::create(['image' => $name]);
    }
    return back()->with('success', 'Multiple images uploaded successfully!');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $images = Photo::findOrFail($id);
        $images->delete();
        return redirect('upload');
    }
}

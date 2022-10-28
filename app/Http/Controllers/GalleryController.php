<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $galleries = Gallery::paginate(10);
            return view('pages.admin.gallery.list', compact('galleries'));
        }
        return view('pages.admin.gallery.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.gallery.input', [
            'gallery' => new Gallery(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::Make($request->all(), [
            'title' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $file = $request->file('image');
        $name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/gallery'), $name);

        Gallery::create([
            'title' => $request->title,
            'image' => $name,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery created',
            'redirect' => route('admin.gallery.index'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('pages.admin.gallery.input', [
            'gallery' => $gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validator = Validator::Make($request->all(), [
            'title' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        if ($request->hasFile('image')) {
            if (file_exists(public_path('images/gallery/' . $gallery->image))) {
                unlink(public_path('images/gallery/' . $gallery->image));
            }
            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/gallery'), $name);
            $gallery->image = $name;
        }

        $gallery->title = $request->title;
        $gallery->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery updated',
            'redirect' => route('admin.gallery.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if (file_exists(public_path('images/gallery/' . $gallery->image))) {
            unlink(public_path('images/gallery/' . $gallery->image));
        }
        $gallery->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery deleted',
            'redirect' => route('admin.gallery.index'),
        ]);
    }
}

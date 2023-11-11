<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Models\Gallery;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $item = Gallery::with(['travel_package'])->get();

        return view('pages.admin.gallery.index', ['items' => $item]);
    }

    public function create()
    {
        $item = TravelPackage::all();

        return view('pages.admin.gallery.create', ['items' => $item]);
    }

    public function store(GalleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/gallery','public');

        Gallery::create($data);
        return redirect()->route('travel-gallery.index');
    }

    public function edit($id)
    {
        $item = Gallery::findOrFail($id);
        $data = TravelPackage::all();
        
        return view('pages.admin.gallery.edit', ['data' => $data, 'item' => $item]);
    }

    public function update(GalleryRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/gallery','public');

        $item = Gallery::findOrFail($id);
        $item->update($data);

        return redirect()->route('travel-gallery.index');
    }

    public function delete($id)
    {
        $data = Gallery::findOrFail($id);
        $data->delete();

        return redirect()->route('travel-gallery.index');
    }
}

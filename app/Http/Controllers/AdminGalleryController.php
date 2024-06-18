<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class AdminGalleryController extends Controller
{
    public function index()
    {
        $images = Gallery::all();
        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create', [
            'action' => route('admin.gallery.store'),
            'method' => 'POST',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Gallery::create([
            'keterangan' => $request->keterangan,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.gallery.index')
                        ->with('success', 'Image uploaded successfully.');
    }

    public function edit($id)
    {
        $image = Gallery::findOrFail($id);
        return view('admin.gallery.edit', [
            'image' => $image,
            'action' => route('admin.gallery.update', $id),
            'method' => 'PUT',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $image->image = $imageName;
        }

        $image->update([
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.gallery.index')
                        ->with('success', 'Image updated successfully.');
    }

    public function destroy($id)
    {
        $image = Gallery::findOrFail($id);
        if ($image->image) {
            unlink(public_path('images') . '/' . $image->image);
        }
        $image->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted successfully.');
    }
}

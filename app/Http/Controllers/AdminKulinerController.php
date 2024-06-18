<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuliner;

class AdminKulinerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kuliners = Kuliner::all();
        return view('admin.kuliner.index', compact('kuliners'));
    }

    public function create()
    {
        return view('admin.kuliner.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artikel' => 'required|string',
        ]);

        // Handle the image upload
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName);

        // Create the Kuliner record
        Kuliner::create([
            'judul' => $request->judul,
            'gambar' => $imageName,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.kuliner.index');
    }

    public function edit($id)
    {
        $kuliner = Kuliner::find($id);
        return view('admin.kuliner.edit', compact('kuliner'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artikel' => 'required|string',
        ]);

        // Find the Kuliner record
        $kuliner = Kuliner::find($id);

        // Handle the image upload if there is a new image
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $kuliner->gambar = $imageName;
        }

        // Update the Kuliner record
        $kuliner->update([
            'judul' => $request->judul,
            'gambar' => $kuliner->gambar,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.kuliner.index');
    }

    public function destroy($id)
    {
        $kuliner = Kuliner::find($id);
        $kuliner->delete();
        return redirect()->route('admin.kuliner.index');
    }
}

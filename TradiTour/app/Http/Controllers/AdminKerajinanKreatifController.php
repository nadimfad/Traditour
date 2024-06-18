<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KerajinanKreatif;

class AdminKerajinanKreatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kerajinanKreatifs = KerajinanKreatif::all();
        return view('admin.kerajinankreatif.index', compact('kerajinanKreatifs'));
    }

    public function create()
    {
        return view('admin.kerajinankreatif.create');
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

        // Create the KerajinanKreatif record
        KerajinanKreatif::create([
            'judul' => $request->judul,
            'gambar' => $imageName,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.kerajinankreatif.index');
    }

    public function edit($id)
    {
        $kerajinanKreatif = KerajinanKreatif::find($id);
        return view('admin.kerajinankreatif.edit', compact('kerajinanKreatif'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artikel' => 'required|string',
        ]);

        // Find the KerajinanKreatif record
        $kerajinanKreatif = KerajinanKreatif::find($id);

        // Handle the image upload if there is a new image
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $kerajinanKreatif->gambar = $imageName;
        }

        // Update the KerajinanKreatif record
        $kerajinanKreatif->update([
            'judul' => $request->judul,
            'gambar' => $kerajinanKreatif->gambar,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.kerajinankreatif.index');
    }

    public function destroy($id)
    {
        $kerajinanKreatif = KerajinanKreatif::find($id);
        $kerajinanKreatif->delete();
        return redirect()->route('admin.kerajinankreatif.index');
    }
}


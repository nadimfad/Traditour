<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahari;

class AdminBahariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $baharis = Bahari::all();
        return view('admin.bahari.index', compact('baharis'));
    }

    public function create()
    {
        return view('admin.bahari.create');
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

        // Create the Bahari record
        Bahari::create([
            'judul' => $request->judul,
            'gambar' => $imageName,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.bahari.index');
    }

    public function edit($id)
    {
        $bahari = Bahari::find($id);
        return view('admin.bahari.edit', compact('bahari'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artikel' => 'required|string',
        ]);

        // Find the Bahari record
        $bahari = Bahari::find($id);

        // Handle the image upload if there is a new image
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $bahari->gambar = $imageName;
        }

        // Update the Bahari record
        $bahari->update([
            'judul' => $request->judul,
            'gambar' => $bahari->gambar,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.bahari.index');
    }

    public function destroy($id)
    {
        $bahari = Bahari::find($id);
        $bahari->delete();
        return redirect()->route('admin.bahari.index');
    }
}


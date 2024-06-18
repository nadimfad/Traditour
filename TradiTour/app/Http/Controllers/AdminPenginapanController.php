<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penginapan;
use Illuminate\Support\Facades\Storage;

class AdminPenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penginapans = Penginapan::all();
        return view('admin.penginapan.index', compact('penginapans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penginapan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'nama_penginapan' => 'required|string|max:255',
            'gambar_penginapan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat_penginapan' => 'required|string',
            'deskripsi_penginapan' => 'required|string',
            'harga_penginapan' => 'required|integer',
        ]);

        // Handle the image upload
        $imageName = time() . '.' . $request->gambar_penginapan->extension();
        $request->gambar_penginapan->move(public_path('images'), $imageName);

        // Create the Penginapan record
        Penginapan::create([
            'nama_penginapan' => $request->nama_penginapan,
            'gambar_penginapan' => $imageName,
            'alamat_penginapan' => $request->alamat_penginapan,
            'deskripsi_penginapan' => $request->deskripsi_penginapan,
            'harga_penginapan' => $request->harga_penginapan,
        ]);

        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan created successfully.');
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penginapan = Penginapan::find($id);
        return view('admin.penginapan.edit', compact('penginapan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_penginapan' => 'required|string|max:255',
            'gambar_penginapan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat_penginapan' => 'required|string',
            'deskripsi_penginapan' => 'required|string',
            'harga_penginapan' => 'required|integer',
        ]);

        $penginapan = Penginapan::find($id);

        if ($request->hasFile('gambar_penginapan')) {
            if (Storage::exists('public/images/' . $penginapan->gambar_penginapan)) {
                Storage::delete('public/images/' . $penginapan->gambar_penginapan);
            }

            $imageName = time() . '.' . $request->gambar_penginapan->extension();
            $request->gambar_penginapan->move(public_path('images'), $imageName);
            $penginapan->gambar_penginapan = $imageName;
        }

        $penginapan->update([
            'nama_penginapan' => $request->nama_penginapan,
            'gambar_penginapan' => $penginapan->gambar_penginapan,
            'alamat_penginapan' => $request->alamat_penginapan,
            'deskripsi_penginapan' => $request->deskripsi_penginapan,
            'harga_penginapan' => $request->harga_penginapan,
        ]);

        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penginapan = Penginapan::find($id);

        // Delete the image from storage
        if (Storage::exists('public/images/' . $penginapan->gambar_penginapan)) {
            Storage::delete('public/images/' . $penginapan->gambar_penginapan);
        }

        $penginapan->delete();
        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan deleted successfully.');
    }
}


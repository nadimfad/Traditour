<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NonBahari;

class AdminNonBahariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nonBaharis = NonBahari::all();
        return view('admin.nonbahari.index', compact('nonBaharis'));
    }

    public function create()
    {
        return view('admin.nonbahari.create');
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

        // Create the NonBahari record
        NonBahari::create([
            'judul' => $request->judul,
            'gambar' => $imageName,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.nonbahari.index');
    }

    public function edit($id)
    {
        $nonBahari = NonBahari::find($id);
        return view('admin.nonbahari.edit', compact('nonBahari'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artikel' => 'required|string',
        ]);

        // Find the NonBahari record
        $nonBahari = NonBahari::find($id);

        // Handle the image upload if there is a new image
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $nonBahari->gambar = $imageName;
        }

        // Update the NonBahari record
        $nonBahari->update([
            'judul' => $request->judul,
            'gambar' => $nonBahari->gambar,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.nonbahari.index');
    }

    public function destroy($id)
    {
        $nonBahari = NonBahari::find($id);
        $nonBahari->delete();
        return redirect()->route('admin.nonbahari.index');
    }
}

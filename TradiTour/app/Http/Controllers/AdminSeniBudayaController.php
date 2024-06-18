<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeniBudaya;

class AdminSeniBudayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seniBudayas = SeniBudaya::all();
        return view('admin.senibudaya.index', compact('seniBudayas'));
    }

    public function create()
    {
        return view('admin.senibudaya.create');
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

        // Create the SeniBudaya record
        SeniBudaya::create([
            'judul' => $request->judul,
            'gambar' => $imageName,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.senibudaya.index');
    }

    public function edit($id)
    {
        $seniBudaya = SeniBudaya::find($id);
        return view('admin.senibudaya.edit', compact('seniBudaya'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artikel' => 'required|string',
        ]);

        // Find the SeniBudaya record
        $seniBudaya = SeniBudaya::find($id);

        // Handle the image upload if there is a new image
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $seniBudaya->gambar = $imageName;
        }

        // Update the SeniBudaya record
        $seniBudaya->update([
            'judul' => $request->judul,
            'gambar' => $seniBudaya->gambar,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.senibudaya.index');
    }

    public function destroy($id)
    {
        $seniBudaya = SeniBudaya::find($id);
        $seniBudaya->delete();
        return redirect()->route('admin.senibudaya.index');
    }
}


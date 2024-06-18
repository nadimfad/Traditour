<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $user = Auth::user();
        $profile = $user->profile;

        // Create a profile if it doesn't exist
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }

        if ($request->hasFile('profile_image')) {
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('images'), $imageName);
            $profile->profile_image = $imageName;
        }

        $profile->name = $request->name;
        $profile->description = $request->description;
        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}

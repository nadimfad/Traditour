<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;

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
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $user = Auth::user();

        // Ensure $user is an instance of User
        if (!($user instanceof User)) {
            return redirect()->route('profile.edit')->withErrors(['error' => 'User not found']);
        }

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

        // Update the user's username
        $user->username = $request->username;
        $user->save();

        $profile->name = $request->name;
        $profile->description = $request->description;
        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}

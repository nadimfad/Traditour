<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Toggle like/unlike a forum post.
     *
     * @param Forum $forum
     * @return \Illuminate\Http\RedirectResponse
     */
    public function like(Forum $forum)
    {
        $user = Auth::user();

        // Check if the user already liked the forum post
        $existingLike = $forum->likes()->where('user_id', $user->id)->first();

        if ($existingLike) {
            // User already liked, unlike the post
            $existingLike->delete();
        } else {
            // User hasn't liked yet, create a new like
            $like = new Like();
            $like->user_id = $user->id;
            $forum->likes()->save($like);
        }

        return redirect()->back();
    }
}
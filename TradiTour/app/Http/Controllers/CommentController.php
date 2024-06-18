<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Forum;

class CommentController extends Controller
{
    public function store(Request $request, $forum_id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $forum = Forum::findOrFail($forum_id);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->id();
        $comment->forum_id = $forum->id;
        $comment->save();

        return redirect()->route('forum.index')->with('success', 'Comment added successfully!');
    }
}

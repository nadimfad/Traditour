<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use Illuminate\Support\Facades\Storage;

class ForumController extends Controller
{
public function index(Request $request)
{

    $sortBy = $request->get('sort_by');

    $sortBy = $sortBy ?? 'latest';


    $category = $request->get('category');

    $sortOptions = [
        'latest' => 'created_at',
        'likes' => 'likes_count',
        'comments' => 'comments_count',
    ];

    if (!array_key_exists($sortBy, $sortOptions)) {
        abort(400, 'Invalid sort_by option.');
    }

    $user = auth()->user();

    $forums = Forum::withCount(['likes', 'comments'])
        ->when($category === 'My Posts', function ($query) use ($user) {
            return $query->where('user_id', $user->id);
        })
        ->when($category && $category !== 'My Posts', function ($query) use ($category) {
            return $query->where('kategori_forum', $category);
        })
        ->orderByDesc($sortOptions[$sortBy])
        ->paginate(10);

    return view('forum.index', compact('forums', 'sortBy', 'category'));
}



    public function create()
    {
        return view('forum.create');
    }

public function store(Request $request)
{
    $request->validate([
        'caption_forum' => 'required',
        'kategori_forum' => 'required',
        'gambar_forum' => 'required|image|max:2048',
    ]);

    $forum = new Forum();
    $forum->user_id = auth()->id();
    $forum->caption_forum = $request->caption_forum;
    $forum->kategori_forum = $request->kategori_forum;

    if ($request->hasFile('gambar_forum')) {
        $file = $request->file('gambar_forum');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);
        $forum->gambar_forum = 'images/' . $fileName;
    }

    $forum->save();

    return redirect()->route('forum.index')->with('success', 'Forum created successfully.');
}
    public function edit(Forum $forum)
    {
        return view('forum.edit', compact('forum'));
    }

    public function update(Request $request, Forum $forum)
{
    $request->validate([
        'caption_forum' => 'required',
        'kategori_forum' => 'required',
        'gambar_forum' => 'nullable|image|max:2048',
    ]);

    if ($forum->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $forum->caption_forum = $request->caption_forum;
    $forum->kategori_forum = $request->kategori_forum;

    if ($request->hasFile('gambar_forum')) {
        $file = $request->file('gambar_forum');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);
        $forum->gambar_forum = 'images/' . $fileName;
    }

    $forum->save();

    return redirect()->route('forum.index', $forum)->with('success', 'Forum updated successfully.');
}

    public function destroy(Forum $forum)
    {
        if ($forum->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $forum->delete();

        return redirect()->route('forum.index')->with('success', 'Forum deleted successfully.');
    }
}



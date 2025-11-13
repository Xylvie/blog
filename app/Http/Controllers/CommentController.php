<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $post)
    {
        $validated = $request->validate([
            'content' => 'required|max:255|string',
        ]);

        $validated['post_id'] = $post;

        if(Auth::check()){
            $validated['user_id'] = Auth::id();
            $validated['author_name'] = Auth::user()->name;
        } else {
            $validated['user_id'] = null;
            $validated['author_name'] = 'Anonymous User';
        }

        Comment::create($validated);

        return back()->with('success', 'Comment added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Comment Deleted!');
    }
}

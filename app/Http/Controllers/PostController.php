<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $posts = Post::all();

        return view('welcome')->with('posts', $posts);
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
    public function store(Request $request)
    {
        
        //Validate input
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'category_id'  => 'exists:categories,id',
            'content'      => 'required|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'       => 'required|in:draft,published',
        ]);

        //Generate slug from title
        $validated['slug'] = Str::slug($validated['title']);

        //Handle image upload (if any)
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = $path;
        }
        //Assign logged-in user as author
        $validated['user_id'] = Auth::id();

        //Create post
        Post::create($validated);

        //Redirect with success message
        return redirect()->back()->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {


        return view('edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);

        $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150);

        $post->update($validated);

        return redirect()->route('home')->with('success', 'Post Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Post Successfully deleted');
    }
}

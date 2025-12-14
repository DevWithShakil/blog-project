<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string|min:50',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/posts'), $imageName);
        }

        Post::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status == 'published' ? now() : null,
            'image' => $imageName,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string|min:50',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|max:2048',
        ]);

        $imageName = $post->image;
        if ($request->hasFile('image')) {
            if ($post->image && file_exists(public_path('uploads/posts/' . $post->image))) {
                unlink(public_path('uploads/posts/' . $post->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/posts'), $imageName);
        }

        $post->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'content' => $request->content,
            'status' => $request->status,
            'image' => $imageName,
            'published_at' => ($request->status == 'published' && !$post->published_at) ? now() : $post->published_at,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    public function destroy(Post $post)
    {
        if ($post->image && file_exists(public_path('uploads/posts/' . $post->image))) {
            unlink(public_path('uploads/posts/' . $post->image));
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}

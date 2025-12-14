<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $recentPosts = Post::with('category', 'user')
                        ->where('status', 'published')
                        ->latest()
                        ->take(10)
                        ->get();

        $categories = Category::all();

        return view('public.home', compact('recentPosts', 'categories'));
    }

public function show($slug)
    {
        $post = Post::where('slug', $slug)
                    ->where('status', 'published')
                    ->firstOrFail();
        $relatedPosts = Post::where('category_id', $post->category_id)
                        ->where('id', '!=', $post->id)
                        ->where('status', 'published')
                        ->take(3)
                        ->get();

        return view('public.show', compact('post', 'relatedPosts'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()
                        ->where('status', 'published')
                        ->latest()
                        ->get();

        return view('public.category', compact('category', 'posts'));
    }
}

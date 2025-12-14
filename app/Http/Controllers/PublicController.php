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

        return view('public.show', compact('post'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;

class BlogController extends Controller
{
    public function index()
    {
        $date = now()->format('Y-m');
        $slides = WinkPost::with('tags')
          ->live()
          ->where('publish_date', 'LIKE', '%'.$date.'%')
          ->inRandomOrder()->limit(3)->get();
        $posts = WinkPost::with('tags')
          ->live()
          ->orderBy('publish_date', 'DESC')
          ->paginate(3);
        return view('index', compact('posts', 'slides'));
    }

    public function show($slug)
    {
        $post = WinkPost::live()->whereSlug($slug)->firstOrFail();
        return view('post', compact('post'));
    }
    public function search(Request $request) {
        $slug = $request->search;

        $posts = WinkPost::live()->where('slug','LIKE','%'.$slug.'%')->get();

        return response()->json($posts);

    }
}
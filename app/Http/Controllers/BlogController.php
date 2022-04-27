<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Wink\WinkPost;

class BlogController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show($slug)
    {
        $post = WinkPost::live()->whereSlug($slug)->firstOrFail();
        return view('post', compact('post'));
    }
    public function search(Request $request) {
        $slug = $request->search;

        $post = WinkPost::live()->where('slug','LIKE','%'.$slug.'%')->get();

        return response()->json($post);

    }
}
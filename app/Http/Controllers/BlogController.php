<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show()
    {
        return view('post');
    }
    public function search(Request $request) {
        $post = $request->search;

        return response()->json([
            [
                'id' => 'uyewgii',
                'title' => $post,
            ],
            [
                'id' => 'iuyewgi',
                'title' => 'Form Controller',
            ],
        ]);

    }
}
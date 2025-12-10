<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Mengarahkan ke file resources/views/posts.blade.php
        return view('posts', [
            "title" => "All Posts",
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        // Pastikan kamu punya file resources/views/post.blade.php (singular)
        // Jika belum ada, buat file post.blade.php sejajar dengan posts.blade.php
        return view('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}
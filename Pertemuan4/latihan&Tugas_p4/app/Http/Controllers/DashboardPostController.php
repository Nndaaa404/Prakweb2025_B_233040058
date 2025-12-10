<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    public function index()
    {
        // Mengarah ke resources/views/dashboard/index.blade.php
        return view('dashboard.index', [
            'posts' => Post::where('user_id', auth()->id())
                ->with('category')
                ->latest()
                ->filter(request(['search']))
                ->paginate(10)->withQueryString()
        ]);
    }

    public function create()
    {
        // Mengarah ke resources/views/dashboard/create.blade.php
        return view('dashboard.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validatedData['user_id'] = auth()->id();
        $validatedData['slug'] = $slug;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect()->route('dashboard.index')->with('success', 'New post has been added!');
    }

    public function show(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }
        // Mengarah ke resources/views/dashboard/show.blade.php
        return view('dashboard.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }
        // Kamu belum punya file edit, nanti buat resources/views/dashboard/edit.blade.php
        // Untuk sementara arahkan ke dashboard index atau buat filenya
        return view('dashboard.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validatedData['user_id'] = auth()->id();
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)->update($validatedData);

        return redirect()->route('dashboard.index')->with('success', 'Post has been updated!');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect()->route('dashboard.index')->with('success', 'Post has been deleted!');
    }
}

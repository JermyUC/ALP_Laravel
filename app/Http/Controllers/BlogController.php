<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', \App\Http\Middleware\CheckIfAdmin::class])->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
        ]);

        $data['user_id'] = Auth::id();

        // Ensure category_id exists to satisfy NOT NULL constraint in DB
        $data['category_id'] = $request->input('category_id', Category::first()?->id ?? 1);

        Blog::create($data);

        return redirect()->route('blog')->with('success', 'Blog created.');
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
        ]);

        $data['category_id'] = $request->input('category_id', $blog->category_id ?? Category::first()?->id ?? 1);

        $blog->update($data);

        return redirect()->route('blog')->with('success', 'Blog updated.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog')->with('success', 'Blog deleted.');
    }
}

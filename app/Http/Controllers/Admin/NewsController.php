<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    /**
     * Display a listing of news.
     */
    public function index()
    {
        $news = News::with(['category', 'user'])->orderBy('created_at', 'desc')->get();
        return view('admin.berita.index', compact('news'));
    }

    /**
     * Show the form for creating a new news article.
     */
    public function create()
    {
        $categories = NewsCategory::orderBy('name')->get();
        return view('admin.berita.create', compact('categories'));
    }

    /**
     * Store a newly created news article.
     */
    public function store(Request $request)
    {
        $request->validate([
            'news_category_id' => ['required', 'exists:news_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data = $request->except(['image', 'is_published']);
        $data['slug'] = Str::slug($request->title);
        
        // Ensure slug is unique
        $slugCount = News::where('slug', 'like', $data['slug'] . '%')->count();
        if ($slugCount > 0) {
            $data['slug'] = $data['slug'] . '-' . ($slugCount + 1);
        }

        $data['user_id'] = auth()->id();
        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $data['is_published'] ? now() : null;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('berita', 'public');
        }

        News::create($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diterbitkan.');
    }

    /**
     * Show the form for editing the news article.
     */
    public function edit(News $beritum)
    {
        // Laravel binds route news to $beritum if the resource is defined as "berita"
        $categories = NewsCategory::orderBy('name')->get();
        return view('admin.berita.edit', ['news' => $beritum, 'categories' => $categories]);
    }

    /**
     * Update the news article.
     */
    public function update(Request $request, News $beritum)
    {
        $request->validate([
            'news_category_id' => ['required', 'exists:news_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data = $request->except(['image', 'is_published']);
        
        // Update slug if title changed
        if ($beritum->title !== $request->title) {
            $data['slug'] = Str::slug($request->title);
            $slugCount = News::where('slug', 'like', $data['slug'] . '%')->where('id', '!=', $beritum->id)->count();
            if ($slugCount > 0) {
                $data['slug'] = $data['slug'] . '-' . ($slugCount + 1);
            }
        }

        $data['is_published'] = $request->has('is_published');
        if ($data['is_published'] && !$beritum->is_published) {
            $data['published_at'] = now();
        } elseif (!$data['is_published']) {
            $data['published_at'] = null;
        }

        if ($request->hasFile('image')) {
            // Delete old image
            if ($beritum->image && Storage::disk('public')->exists($beritum->image)) {
                Storage::disk('public')->delete($beritum->image);
            }
            $data['image'] = $request->file('image')->store('berita', 'public');
        }

        $beritum->update($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the news article.
     */
    public function destroy(News $beritum)
    {
        if ($beritum->image && Storage::disk('public')->exists($beritum->image)) {
            Storage::disk('public')->delete($beritum->image);
        }

        $beritum->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}

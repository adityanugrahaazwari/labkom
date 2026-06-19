<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of news categories.
     */
    public function index()
    {
        $categories = NewsCategory::withCount('news')->orderBy('name')->get();
        return view('admin.berita-kategori.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.berita-kategori.create');
    }

    /**
     * Store a newly created category.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:news_categories,name'],
        ]);

        NewsCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.berita-kategori.index')
            ->with('success', 'Kategori berita berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the category.
     */
    public function edit(NewsCategory $beritaKategori)
    {
        return view('admin.berita-kategori.edit', compact('beritaKategori'));
    }

    /**
     * Update the category in storage.
     */
    public function update(Request $request, NewsCategory $beritaKategori)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('news_categories', 'name')->ignore($beritaKategori->id)],
        ]);

        $beritaKategori->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.berita-kategori.index')
            ->with('success', 'Kategori berita berhasil diperbarui.');
    }

    /**
     * Remove the category from storage.
     */
    public function destroy(NewsCategory $beritaKategori)
    {
        if ($beritaKategori->news()->count() > 0) {
            return redirect()->route('admin.berita-kategori.index')
                ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki berita terkait.');
        }

        $beritaKategori->delete();

        return redirect()->route('admin.berita-kategori.index')
            ->with('success', 'Kategori berita berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $settings = \App\Models\Setting::pluck('value', 'key')->all();
        $latestNews = \App\Models\News::with(['category', 'user'])
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
        $upcomingAgendas = \App\Models\Agenda::where('status', true)
            ->orderBy('event_date', 'desc')
            ->take(3)
            ->get();
        $faqs = \App\Models\Faq::where('is_active', true)->orderBy('order')->orderBy('id')->get();

        return view('welcome', compact('settings', 'latestNews', 'upcomingAgendas', 'faqs'));
    }

    public function visiMisi()
    {
        $visiMisi = \App\Models\VisiMisi::first();
        return view('profil.visi-misi', compact('visiMisi'));
    }

    public function strukturOrganisasi()
    {
        $rootMembers = \App\Models\StrukturOrganisasi::with('children')
            ->whereNull('parent_id')
            ->orderBy('order')
            ->orderBy('id')
            ->get();
        return view('profil.struktur-organisasi', compact('rootMembers'));
    }

    public function laboratorium()
    {
        $laboratories = \App\Models\Laboratory::where('status', true)->orderBy('name')->get();
        return view('fasilitas.laboratorium', compact('laboratories'));
    }

    public function laboratoriumDetail($slug)
    {
        $laboratory = \App\Models\Laboratory::where('slug', $slug)->where('status', true)->firstOrFail();
        return view('fasilitas.show', compact('laboratory'));
    }

    public function berita(Request $request)
    {
        $query = \App\Models\News::with(['category', 'user'])->where('is_published', true);
        
        if ($request->filled('kategori')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->kategori);
            });
        }

        $news = $query->orderBy('published_at', 'desc')->paginate(6);
        $categories = \App\Models\NewsCategory::withCount(['news' => function ($q) {
            $q->where('is_published', true);
        }])->orderBy('name')->get();

        return view('berita.index', compact('news', 'categories'));
    }

    public function beritaDetail($slug)
    {
        $news = \App\Models\News::with(['category', 'user'])->where('slug', $slug)->where('is_published', true)->firstOrFail();
        $news->increment('views');
        
        $latestNews = \App\Models\News::where('id', '!=', $news->id)->where('is_published', true)->orderBy('published_at', 'desc')->take(4)->get();
        
        return view('berita.show', compact('news', 'latestNews'));
    }

    public function unduhan()
    {
        $documents = \App\Models\Document::orderBy('created_at', 'desc')->get();
        return view('unduhan.index', compact('documents'));
    }

    public function downloadDocument($id)
    {
        $document = \App\Models\Document::findOrFail($id);
        $document->increment('download_count');
        
        return \Illuminate\Support\Facades\Storage::disk('public')->download($document->file_path);
    }

    public function faq()
    {
        $faqs = \App\Models\Faq::where('is_active', true)->orderBy('order')->orderBy('id')->get();
        return view('faq', compact('faqs'));
    }

    public function agenda()
    {
        $agendas = \App\Models\Agenda::where('status', true)->orderBy('event_date', 'desc')->get();
        return view('agenda.index', compact('agendas'));
    }

    public function agendaDetail($slug)
    {
        $agenda = \App\Models\Agenda::where('slug', $slug)->where('status', true)->firstOrFail();
        return view('agenda.show', compact('agenda'));
    }
}

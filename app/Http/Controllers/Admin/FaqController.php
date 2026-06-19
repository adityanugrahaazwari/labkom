<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs.
     */
    public function index()
    {
        $faqs = Faq::orderBy('order')->orderBy('id')->get();
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new FAQ.
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created FAQ.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'order' => ['required', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data = $request->except('is_active');
        $data['is_active'] = $request->has('is_active');

        Faq::create($data);

        return redirect()->route('admin.faq.index')
            ->with('success', 'FAQ berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the FAQ.
     */
    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the FAQ in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'order' => ['required', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data = $request->except('is_active');
        $data['is_active'] = $request->has('is_active');

        $faq->update($data);

        return redirect()->route('admin.faq.index')
            ->with('success', 'FAQ berhasil diperbarui.');
    }

    /**
     * Remove the FAQ from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faq.index')
            ->with('success', 'FAQ berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    /**
     * Display a listing of agendas.
     */
    public function index()
    {
        $agendas = Agenda::orderBy('event_date', 'desc')->get();
        return view('admin.agenda.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new agenda.
     */
    public function create()
    {
        return view('admin.agenda.create');
    }

    /**
     * Store a newly created agenda.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'event_date' => ['required', 'date'],
            'start_time' => ['nullable', 'string'],
            'end_time' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'status' => ['nullable', 'boolean'],
        ]);

        $data = $request->except(['image', 'status']);
        $data['slug'] = Str::slug($request->title);
        $data['status'] = $request->has('status');

        // Handle unique slug
        $slugCount = Agenda::where('slug', 'like', $data['slug'] . '%')->count();
        if ($slugCount > 0) {
            $data['slug'] = $data['slug'] . '-' . ($slugCount + 1);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('agenda', 'public');
        }

        Agenda::create($data);

        return redirect()->route('admin.agenda.index')
            ->with('success', 'Agenda kegiatan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the agenda.
     */
    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    /**
     * Update the agenda in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'event_date' => ['required', 'date'],
            'start_time' => ['nullable', 'string'],
            'end_time' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'status' => ['nullable', 'boolean'],
        ]);

        $data = $request->except(['image', 'status']);
        
        if ($agenda->title !== $request->title) {
            $data['slug'] = Str::slug($request->title);
            $slugCount = Agenda::where('slug', 'like', $data['slug'] . '%')->where('id', '!=', $agenda->id)->count();
            if ($slugCount > 0) {
                $data['slug'] = $data['slug'] . '-' . ($slugCount + 1);
            }
        }

        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($agenda->image && Storage::disk('public')->exists($agenda->image)) {
                Storage::disk('public')->delete($agenda->image);
            }
            $data['image'] = $request->file('image')->store('agenda', 'public');
        }

        $agenda->update($data);

        return redirect()->route('admin.agenda.index')
            ->with('success', 'Agenda kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the agenda from storage.
     */
    public function destroy(Agenda $agenda)
    {
        if ($agenda->image && Storage::disk('public')->exists($agenda->image)) {
            Storage::disk('public')->delete($agenda->image);
        }

        $agenda->delete();

        return redirect()->route('admin.agenda.index')
            ->with('success', 'Agenda kegiatan berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of laboratories.
     */
    public function index()
    {
        $laboratories = Laboratory::orderBy('name')->get();
        return view('admin.facilities.index', compact('laboratories'));
    }

    /**
     * Show the form for creating a new laboratory.
     */
    public function create()
    {
        return view('admin.facilities.create');
    }

    /**
     * Store a newly created laboratory.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:laboratories,name'],
            'description' => ['required', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'head_of_lab' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
            'status' => ['nullable', 'boolean'],
        ]);

        $data = $request->except(['image', 'status']);
        $data['slug'] = Str::slug($request->name);
        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('laboratorium', 'public');
        }

        Laboratory::create($data);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Laboratorium berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the laboratory.
     */
    public function edit($id)
    {
        // Note: Route binds to 'facility' as parameter based on MenuSeeder url `/admin/facilities`
        // We will query it manually to be safe or typehint if parameter name is matching.
        // Let's resolve the instance:
        $facility = Laboratory::findOrFail($id);
        return view('admin.facilities.edit', compact('facility'));
    }

    /**
     * Update the laboratory in storage.
     */
    public function update(Request $request, $id)
    {
        $facility = Laboratory::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('laboratories', 'name')->ignore($facility->id)],
            'description' => ['required', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'head_of_lab' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
            'status' => ['nullable', 'boolean'],
        ]);

        $data = $request->except(['image', 'status']);
        $data['slug'] = Str::slug($request->name);
        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($facility->image && Storage::disk('public')->exists($facility->image)) {
                Storage::disk('public')->delete($facility->image);
            }
            $data['image'] = $request->file('image')->store('laboratorium', 'public');
        }

        $facility->update($data);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Laboratorium berhasil diperbarui.');
    }

    /**
     * Remove the laboratory from storage.
     */
    public function destroy($id)
    {
        $facility = Laboratory::findOrFail($id);

        if ($facility->image && Storage::disk('public')->exists($facility->image)) {
            Storage::disk('public')->delete($facility->image);
        }

        $facility->delete();

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Laboratorium berhasil dihapus.');
    }
}

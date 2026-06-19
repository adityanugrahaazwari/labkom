<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of organization members.
     */
    public function index()
    {
        // Get root members with nested children
        $rootMembers = StrukturOrganisasi::with('children')
            ->whereNull('parent_id')
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        // Also get all members for a flat list / search
        $allMembers = StrukturOrganisasi::with('parent')
            ->orderBy('parent_id')
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        return view('admin.struktur-organisasi.index', compact('rootMembers', 'allMembers'));
    }

    /**
     * Show the form for creating a new member.
     */
    public function create()
    {
        $parents = StrukturOrganisasi::orderBy('name')->get();
        return view('admin.struktur-organisasi.create', compact('parents'));
    }

    /**
     * Store a newly created member.
     */
    public function store(Request $request)
    {
        $request->validate([
            'parent_id' => ['nullable', 'exists:struktur_organisasis,id'],
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'nip' => ['nullable', 'string', 'max:50'],
            'specialty' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'order' => ['required', 'integer'],
        ]);

        $data = $request->except('avatar');

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('struktur', 'public');
        }

        StrukturOrganisasi::create($data);

        return redirect()->route('admin.struktur-organisasi.index')
            ->with('success', 'Anggota struktur organisasi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified member.
     */
    public function edit(StrukturOrganisasi $strukturOrganisasi)
    {
        $parents = $strukturOrganisasi->getPossibleParents();
        return view('admin.struktur-organisasi.edit', compact('strukturOrganisasi', 'parents'));
    }

    /**
     * Update the specified member.
     */
    public function update(Request $request, StrukturOrganisasi $strukturOrganisasi)
    {
        $request->validate([
            'parent_id' => [
                'nullable', 
                'exists:struktur_organisasis,id',
                function ($attribute, $value, $fail) use ($strukturOrganisasi) {
                    if ($value == $strukturOrganisasi->id) {
                        $fail('Anggota tidak boleh dipimpin oleh dirinya sendiri.');
                    }
                    if (in_array($value, $strukturOrganisasi->getDescendantIds())) {
                        $fail('Anggota tidak boleh dipimpin oleh bawahannya sendiri.');
                    }
                }
            ],
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'nip' => ['nullable', 'string', 'max:50'],
            'specialty' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'order' => ['required', 'integer'],
        ]);

        $data = $request->except('avatar');

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($strukturOrganisasi->avatar && Storage::disk('public')->exists($strukturOrganisasi->avatar)) {
                Storage::disk('public')->delete($strukturOrganisasi->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('struktur', 'public');
        }

        $strukturOrganisasi->update($data);

        return redirect()->route('admin.struktur-organisasi.index')
            ->with('success', 'Anggota struktur organisasi berhasil diperbarui.');
    }

    /**
     * Remove the specified member.
     */
    public function destroy(StrukturOrganisasi $strukturOrganisasi)
    {
        if ($strukturOrganisasi->avatar && Storage::disk('public')->exists($strukturOrganisasi->avatar)) {
            Storage::disk('public')->delete($strukturOrganisasi->avatar);
        }

        $strukturOrganisasi->delete();

        return redirect()->route('admin.struktur-organisasi.index')
            ->with('success', 'Anggota struktur organisasi berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationalStructureController extends Controller
{
    /**
     * Display a listing of organization members.
     */
    public function index()
    {
        // Get root members with nested children
        $rootMembers = OrganizationalStructure::with('children')
            ->whereNull('parent_id')
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        // Also get all members for a flat list / search
        $allMembers = OrganizationalStructure::with('parent')
            ->orderBy('parent_id')
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        return view('admin.organizational-structure.index', compact('rootMembers', 'allMembers'));
    }

    /**
     * Show the form for creating a new member.
     */
    public function create()
    {
        $parents = OrganizationalStructure::orderBy('name')->get();
        return view('admin.organizational-structure.create', compact('parents'));
    }

    /**
     * Store a newly created member.
     */
    public function store(Request $request)
    {
        $request->validate([
            'parent_id' => ['nullable', 'exists:organizational_structures,id'],
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

        OrganizationalStructure::create($data);

        return redirect()->route('admin.organizational-structure.index')
            ->with('success', 'Organizational structure member added successfully.');
    }

    /**
     * Show the form for editing the specified member.
     */
    public function edit(OrganizationalStructure $organizationalStructure)
    {
        $parents = $organizationalStructure->getPossibleParents();
        return view('admin.organizational-structure.edit', compact('organizationalStructure', 'parents'));
    }

    /**
     * Update the specified member.
     */
    public function update(Request $request, OrganizationalStructure $organizationalStructure)
    {
        $request->validate([
            'parent_id' => [
                'nullable', 
                'exists:organizational_structures,id',
                function ($attribute, $value, $fail) use ($organizationalStructure) {
                    if ($value == $organizationalStructure->id) {
                        $fail('Anggota tidak boleh dipimpin oleh dirinya sendiri.');
                    }
                    if (in_array($value, $organizationalStructure->getDescendantIds())) {
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
            if ($organizationalStructure->avatar && Storage::disk('public')->exists($organizationalStructure->avatar)) {
                Storage::disk('public')->delete($organizationalStructure->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('struktur', 'public');
        }

        $organizationalStructure->update($data);

        return redirect()->route('admin.organizational-structure.index')
            ->with('success', 'Organizational structure member updated successfully.');
    }

    /**
     * Remove the specified member.
     */
    public function destroy(OrganizationalStructure $organizationalStructure)
    {
        if ($organizationalStructure->avatar && Storage::disk('public')->exists($organizationalStructure->avatar)) {
            Storage::disk('public')->delete($organizationalStructure->avatar);
        }

        $organizationalStructure->delete();

        return redirect()->route('admin.organizational-structure.index')
            ->with('success', 'Organizational structure member deleted successfully.');
    }
}

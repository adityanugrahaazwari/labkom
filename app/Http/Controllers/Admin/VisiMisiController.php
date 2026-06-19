<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Show the form for editing Visi & Misi.
     */
    public function edit()
    {
        $visiMisi = VisiMisi::first();
        if (!$visiMisi) {
            $visiMisi = VisiMisi::create([
                'visi' => 'Default Visi',
                'misi' => ['Default Misi 1']
            ]);
        }
        return view('admin.visi-misi.edit', compact('visiMisi'));
    }

    /**
     * Update the Visi & Misi.
     */
    public function update(Request $request)
    {
        $request->validate([
            'visi' => ['required', 'string'],
            'misi' => ['required', 'array'],
            'misi.*' => ['required', 'string'],
        ]);

        $visiMisi = VisiMisi::first();
        if (!$visiMisi) {
            $visiMisi = new VisiMisi();
        }

        $visiMisi->visi = $request->visi;
        
        // Filter out empty items
        $misiArray = array_filter($request->misi, fn($item) => !is_null($item) && trim($item) !== '');
        $visiMisi->misi = array_values($misiArray);
        
        $visiMisi->save();

        return redirect()->route('admin.visi-misi.edit')
            ->with('success', 'Visi & Misi berhasil diperbarui.');
    }
}

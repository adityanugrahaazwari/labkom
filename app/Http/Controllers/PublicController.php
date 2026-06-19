<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $settings = \App\Models\Setting::pluck('value', 'key')->all();
        return view('welcome', compact('settings'));
    }

    public function visiMisi()
    {
        return view('profil.visi-misi');
    }

    public function strukturOrganisasi()
    {
        return view('profil.struktur-organisasi');
    }

    public function laboratorium()
    {
        return view('fasilitas.laboratorium');
    }

    public function laboratoriumDetail($slug)
    {
        return view('fasilitas.show', compact('slug'));
    }

    public function berita()
    {
        return view('berita.index');
    }

    public function beritaDetail($slug)
    {
        return view('berita.show', compact('slug'));
    }

    public function unduhan()
    {
        return view('unduhan.index');
    }
}

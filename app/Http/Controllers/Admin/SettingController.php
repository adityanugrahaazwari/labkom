<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            // Hero
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_subtitle' => ['required', 'string'],
            'hero_image' => ['nullable', 'image', 'max:2048'],
            'hero_primary_btn_text' => ['required', 'string', 'max:50'],
            'hero_primary_btn_url' => ['required', 'string', 'max:255'],
            'hero_secondary_btn_text' => ['required', 'string', 'max:50'],
            'hero_secondary_btn_url' => ['required', 'string', 'max:255'],

            // Greetings
            'greetings_title' => ['required', 'string', 'max:255'],
            'greetings_name' => ['required', 'string', 'max:255'],
            'greetings_role' => ['required', 'string', 'max:255'],
            'greetings_content' => ['required', 'string'],
            'greetings_avatar' => ['nullable', 'image', 'max:2048'],

            // Footer
            'footer_about' => ['required', 'string'],
            'footer_address' => ['required', 'string'],
            'footer_email' => ['required', 'email', 'max:255'],
            'footer_phone' => ['required', 'string', 'max:50'],
            'footer_copyright' => ['required', 'string', 'max:255'],

            // Socials
            'social_instagram' => ['nullable', 'url'],
            'social_facebook' => ['nullable', 'url'],
            'social_youtube' => ['nullable', 'url'],
            'social_linkedin' => ['nullable', 'url'],
            'social_tiktok' => ['nullable', 'url'],
            'social_twitter' => ['nullable', 'url'],
        ]);

        $keys = [
            'hero_title', 'hero_subtitle', 'hero_primary_btn_text', 'hero_primary_btn_url',
            'hero_secondary_btn_text', 'hero_secondary_btn_url', 'greetings_title',
            'greetings_name', 'greetings_role', 'greetings_content', 'footer_about',
            'footer_address', 'footer_email', 'footer_phone', 'footer_copyright',
            'social_instagram', 'social_facebook', 'social_youtube', 'social_linkedin',
            'social_tiktok', 'social_twitter'
        ];

        foreach ($keys as $key) {
            Setting::set($key, $request->input($key));
        }

        // Handle File Uploads
        if ($request->hasFile('hero_image')) {
            $oldPath = Setting::get('hero_image');
            if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('hero_image')->store('settings', 'public');
            Setting::set('hero_image', $path);
        }

        if ($request->hasFile('greetings_avatar')) {
            $oldPath = Setting::get('greetings_avatar');
            if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('greetings_avatar')->store('settings', 'public');
            Setting::set('greetings_avatar', $path);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Konfigurasi Landing Page berhasil diperbarui.');
    }
}

<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_social_media_icons_are_displayed_in_public_footer(): void
    {
        $this->seed();

        // Check defaults are set correctly first
        Setting::set('social_tiktok', 'https://tiktok.com/@labkom');
        Setting::set('social_twitter', 'https://x.com/labkom');

        $response = $this->get('/');
        $response->assertStatus(200);

        // Check if fontawesome CDN link is present
        $response->assertSee('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', false);

        // Check if individual social media links are present
        $response->assertSee('https://instagram.com', false);
        $response->assertSee('https://facebook.com', false);
        $response->assertSee('https://youtube.com', false);
        $response->assertSee('https://linkedin.com', false);
        $response->assertSee('https://tiktok.com/@labkom', false);
        $response->assertSee('https://x.com/labkom', false);

        // Check if FontAwesome classes for new icons exist
        $response->assertSee('fa-tiktok', false);
        $response->assertSee('fa-x-twitter', false);
    }

    public function test_admin_can_update_social_media_settings_including_tiktok_and_twitter(): void
    {
        $this->seed();

        \Illuminate\Support\Facades\Gate::define('manage-settings', function ($user) {
            return true;
        });

        $superAdmin = User::where('email', 'admin@labkom.com')->first();
        $this->actingAs($superAdmin);

        $data = [
            'hero_title' => 'Pusat Riset Baru',
            'hero_subtitle' => 'Subtitle Baru',
            'hero_primary_btn_text' => 'Button 1',
            'hero_primary_btn_url' => '/btn1',
            'hero_secondary_btn_text' => 'Button 2',
            'hero_secondary_btn_url' => '/btn2',
            'greetings_title' => 'Greetings Title',
            'greetings_name' => 'Greetings Name',
            'greetings_role' => 'Greetings Role',
            'greetings_content' => 'Greetings Content',
            'footer_about' => 'About Us',
            'footer_address' => '123 St',
            'footer_email' => 'admin@labkom.com',
            'footer_phone' => '12345678',
            'footer_copyright' => 'All Rights Reserved',
            'social_instagram' => 'https://instagram.com/newig',
            'social_facebook' => 'https://facebook.com/newfb',
            'social_youtube' => 'https://youtube.com/newyt',
            'social_linkedin' => 'https://linkedin.com/newin',
            'social_tiktok' => 'https://tiktok.com/@newtiktok',
            'social_twitter' => 'https://x.com/newtwitter',
        ];

        $response = $this->post(route('admin.settings.update'), $data);

        $response->assertRedirect(route('admin.settings.index'));
        $this->assertEquals('https://tiktok.com/@newtiktok', Setting::get('social_tiktok'));
        $this->assertEquals('https://x.com/newtwitter', Setting::get('social_twitter'));
    }
}


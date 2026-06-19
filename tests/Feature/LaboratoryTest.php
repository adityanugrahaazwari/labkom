<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LaboratoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_laboratory_detail_page_shows_penanggung_jawab_details(): void
    {
        $this->seed();
        $slugs = [
            'laboratorium-programming',
            'laboratorium-networking',
            'laboratorium-multimedia',
            'laboratorium-ai-data-science',
            'laboratorium-hardware-iot',
        ];

        foreach ($slugs as $slug) {
            $response = $this->get('/fasilitas/laboratorium/' . $slug);

            $response->assertStatus(200);
            $response->assertSee('Kepala / Penanggung Jawab');
            $response->assertSee('Informasi Ruangan');
        }
    }
}

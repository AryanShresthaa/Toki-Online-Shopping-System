<?php

namespace Tests\Feature;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_renders_banners_without_error(): void
    {
        Category::create(['name' => 'Combo Pack', 'image' => 'categories/combo.jpg']);
        Banner::create([
            'title' => 'Summer Sale',
            'subtitle' => 'Fresh deals',
            'description' => 'Limited time only',
            'image' => 'banners/summer.jpg',
        ]);

        $response = $this->get('/home');

        $response->assertStatus(200);
        $response->assertSee('Summer Sale');
    }
}

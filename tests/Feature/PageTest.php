<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Test index page.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test admin page.
     */
    public function test_the_admin_page_returns_a_redirect_response(): void
    {
        $response = $this->get('/admin');

        $response->assertStatus(302);
    }

    /**
     * Test admin page.
     */
    public function test_the_admin_page_returns_a_successful_response(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    /**
     * Test detail product page.
     */
    // public function test_the_detail_product_page_returns_a_successful_response(): void
    // {
    //     $productType = ProductType::factory()->create();
    //     $product = Product::factory()->create([
    //         'product_type_id' => $productType->id,
    //         'slug' => 'test-product-slug',
    //     ]);

    //     $response = $this->get(route('product.show', [$productType->code, $product->slug]));

    //     $response->assertStatus(200);

    //     $response->assertSee($product->name);
    //     $response->assertSee($product->price);
    // }
}

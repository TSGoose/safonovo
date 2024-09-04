<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{
    public function show()
    {
        return view('products.show');
    }
    public function showOne(string $code)
    {
        $product = Product::where('code', $code)
            ->where('is_active', true)
            ->firstOrFail();

        return view('livewire.order-modal', compact('product'));
    }
}

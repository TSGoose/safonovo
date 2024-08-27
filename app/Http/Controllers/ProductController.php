<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;

class ProductController extends Controller
{
    public function show()
    {
        return view('products.show');
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class ProductsController extends Controller
{
    public function show()
    {
        return view('products.show');
    }
    public function showOne()
    {
        return view('livewire.order-modal');
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ProductType;

class IndexController extends Controller
{
    public function index()
    {
        $productTypes = ProductType::where('is_active', true)->with('products')->get();
        $articles = Article::where('is_active', true)->get();

        return view('index', compact(
            'productTypes',
            'articles',
        ));
    }
}

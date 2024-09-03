<?php

declare(strict_types=1);

namespace App\Http\Controllers;


class ProductionController extends Controller
{
    public function show()
    {
        return view('production.show');
    }
}

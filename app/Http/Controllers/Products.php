<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Products extends Controller
{
    /**
     * Returns all products over $10
     * @return array
     */
    public function getProducts()
    {
        return \App\Models\Products::fetchProductsOverTenDollars()->toArray();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cart extends Controller
{
    public function index()
    {
        $data['products'] = \App\Models\Products::fetchProductsOverTenDollars()->toArray();
        return view('welcome', $data);
    }

    public function addToCart(Request $request)
    {
        $productId = $request->get('id');
        if (!\App\Models\Products::validId($productId)) {
            return ['error' => 'Invalid product ID'];
        }

        $product = \App\Models\Products::fetchProduct($productId);
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            $cart[$productId]['subtotal'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];
            $request->session()->put('cart', $cart);
            return ['success' => true];
        }

        $cart[$productId] = [
            'quantity' => 1,
            'name' => $product['name'],
            'price' => $product['price'],
            'subtotal' => $product['price'],
        ];
        $request->session()->put('cart', $cart);

        return ['success' => true];
    }

    public function getCart(Request $request)
    {
        if (!$request->session()->has('cart')) {
            return [];
        }
        return $request->session()->get('cart');
    }
}

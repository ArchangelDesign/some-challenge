<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    /**
     * @return Products[]
     */
    public static function fetchAllProducts()
    {
        return self::all();
    }

    /**
     * @return Products[]
     */
    public static function fetchProductsOverTenDollars()
    {
        return self::query()->where('price', '>', 1000)->orderBy('price')->get();
    }

    public static function validId( mixed $productId ): bool
    {
        return self::query()->where('id', '=', $productId)->count() > 0;
    }

    public static function fetchProduct( mixed $productId ) {
        return self::query()->where(['id' => $productId])->first();
    }
}

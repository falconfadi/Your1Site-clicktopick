<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\CartItem;

use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the Product "creating" event.
     *
     * @param Product $product
     * @return void
     */
    public function creating(Product $product)
    {
        $product->slug = Str::slug($product->name) . '-'. rand(1, 1000);
    }

    /**
     * Handle the Product "updating" event.
     *
     * @param Product $product
     * @return void
     */
    public function updating(Product $product)
    {
        $product->slug = Str::slug($product->name) . '-'. rand(1, 1000);
    }

    public function deleting(Product $product)
    {
    //   $items=   CartItems::query()->where('product_id', $product->id)->get();
    //   dd($items);
    }
}

<?php

namespace Database\Seeders;

use App\Helpers\FakerHelper;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = new FakerHelper();


        Slider::query()->create([
            'title' => 'Lighting',
            'brief' => 'MODERN LAMPS',
            'sort_order' => 1,
            'product_id' => Product::query()->inRandomOrder()->first()->id,
            'background_image' => $f->imageUrl(1920, 725, 'NOT USED', false),
            'responsive_image' => $f->imageUrl(767, 700, 'NOT USED', false),
        ]);

        Slider::query()->create([
            'title' => 'Lighting',
            'brief' => 'MODERN LAMPS',
            'sort_order' => 2,
            'product_id' => Product::query()->inRandomOrder()->first()->id,
            'background_image' => $f->imageUrl(1920, 725, 'NOT USED', false),
            'responsive_image' => $f->imageUrl(767, 700, 'NOT USED', false),
        ]);

        Slider::query()->create([
            'title' => 'Lighting',
            'brief' => 'MODERN LAMPS',
            'sort_order' => 3,
            'product_id' => Product::query()->inRandomOrder()->first()->id,
            'background_image' => $f->imageUrl(1920, 725, 'NOT USED', false),
            'responsive_image' => $f->imageUrl(767, 700, 'NOT USED', false),
        ]);
    }
}

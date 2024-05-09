<?php

namespace Database\Factories;

use App\Helpers\FakerHelper;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $f = new FakerHelper();
        $height = rand(600, 900);
        $width = intval($height * 2 / 3);

        $randomCategory = Category::query()
            ->whereNotNull('parent_category')
            ->inRandomOrder()
            ->first();


        $randomVendor = Admin::role('Admin')->inRandomOrder()->first()->id;

        return [
            'name:en' => $this->faker->name,
            'description:en' => $this->faker->text,
            'sku' => $this->faker->name,
            'category_id' => $randomCategory->id,
            'price' => $this->faker->numberBetween(1, 99999),
            'price_before_discount' => $this->faker->numberBetween(1, 99999),
            'status' => 1,
            'sort_order' => $this->faker->numberBetween(1,100),
            'admin_id' => $randomVendor,
            'images' => [
                $f->imageUrl($width, $height, 'NOT USED', false),
                $f->imageUrl($width, $height, 'NOT USED', false)
            ],
            'featured_image' => $f->imageUrl($width, $height, 'NOT USED', false),
        ];
    }
}

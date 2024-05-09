<?php

namespace Database\Factories;

use App\Helpers\FakerHelper;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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

        return [
            'name:en' => $this->faker->name,
            'sort_order' => $this->faker->numberBetween(1, 100),
            'is_active' => 1,
            'parent_category' => Category::query()->first()->id,
            'image' => $f->imageUrl($width, $height, 'NOT USED', false),
        ];
    }
}

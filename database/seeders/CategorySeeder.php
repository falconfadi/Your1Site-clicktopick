<?php

namespace Database\Seeders;

use App\Helpers\FakerHelper;
use App\Models\Attribute;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = new FakerHelper();
        $height = rand(600, 900);
        $width = intval($height * 2 / 3);

        Category::query()->create([
           'name:en' =>  'Main Category',
           'name:ar' => 'Maain Category',
            'is_active' => 1,
            'parent_category' => null,
            'image' => $f->imageUrl($width, $height, 'NOT USED', false)
        ]);

    }
}

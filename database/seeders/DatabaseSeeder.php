<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        City::factory()->count(6)->create();

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(CurrencySeeder::class);

        $admins = Admin::factory()->count(5)->create();

//        $admins->each(function($admin){
//            if (!$admin->hasRole( ['Admin'])){
//                if ($admin->id > 5) {
//                    $admin->assignRole(Role::findByName('vendor', 'web'));
//                }
//            }
//            $admin->save();
//        });

        $categories = Category::factory()->count(20)->create();
        $attributes = Attribute::factory()->count(10)->create();
        $products = Product::factory()->count(20)->create();

        User::factory()->count(20)->create();

        $this->call(SliderSeeder::class);

        $categories->each(function($category){
            $attributes = Attribute::inRandomOrder()->limit(3)->get();
            $category->attributes()->attach($attributes);
        });

        foreach ($products as $product){
            foreach ($attributes as $attribute){
                if($attribute->categories->contains($product->category))
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $attribute->id,
                        'value' => $attribute->type == 'checkbox' ? '1': rand(1, 99999)
                    ]);
            }
        }
        }
    }


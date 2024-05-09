<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::query()->delete();

        Currency::query()->create([
           'name:en' => 'United States Dollar',
           'is_active' => 1,
           'code' => 'USD',
           'symbol' => '$',
           'rate' => 2.60
       ]);

        Currency::query()->create([
            'name:en' => 'saudi Rial',
            'is_active' => 1,
            'code' => 'SAR',
            'symbol' => 'SAR',
            'rate' => 1
        ]);

    }
}

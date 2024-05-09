<?php

namespace Database\Factories;

use App\Helpers\FakerHelper;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

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
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'username' => $this->faker->userName,
            'status' => 1,
            'about' => $this->faker->text,
            'whatsapp' => $this->faker->phoneNumber,
            'phone_number' => $this->faker->phoneNumber,
            'website_url' => $this->faker->url,
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'avatar' => $f->imageUrl($width, $height, 'NOT USED', false),
            'cover_image' => $f->imageUrl($width, $height, 'NOT USED', false),
            'remember_token' => Str::random(10),
        ];
    }
}

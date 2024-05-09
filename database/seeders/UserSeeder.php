<?php

namespace Database\Seeders;

use App\Helpers\FakerHelper;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
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

        $admin = Admin::where('email', 'admin@green-leaf.com')->first();
        if (!$admin)
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@green-leaf.com',
            'username' => 'admin.green-leaf',
            'status' =>1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'avatar' => $f->imageUrl($width, $height, 'NOT USED', false),
            'cover_image' => $f->imageUrl($width, $height, 'NOT USED', false),
            'phone_number' => '00964123123123',
            'whatsapp' => '00964123123123',
            'website_url' => 'https://admin.green-leaf.com',
            'facebook' => 'https://fb.com/green-leaf',
            'instagram' => 'https://instagram.com/green-leaf',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.',
        ]);

        $vendor = Admin::where('email', 'vendor@green-leaf.com')->first();
        if (!$vendor)
            DB::table('admins')->insert([
                'name' => 'green-leaf Admin',
                'email' => 'vendor@green-leaf.com',
                'username' => 'vendor.green-leaf',
                'status' =>1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'avatar' => $f->imageUrl($width, $height, 'NOT USED', false),
                'cover_image' => $f->imageUrl($width, $height, 'NOT USED', false),
                'phone_number' => '00964123123123',
                'whatsapp' => '00964123123123',
                'website_url' => 'https://admin.green-leaf.com',
                'facebook' => 'https://fb.com/green-leaf',
                'instagram' => 'https://instagram.com/green-leaf',
                'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.',
            ]);



        $client = User::where('email', 'client@green-leaf.com')->first();
        if (!$client)
            DB::table('users')->insert([
                'first_name' => 'Client',
                'last_name' => 'User',
                'email' => 'client@green-leaf.com',
                'phone_number' => '0909090909',
                'post_code' => '0909',
                'avatar' => $f->imageUrl($width, $height, 'NOT USED', false),
                'status' => 1,
                'app_notification_status' => 'yes',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]);


        $shipping = Admin::query()->where('email', 'shipping.provider@green-leaf.com')->first();
        if (!$shipping)
            Admin::query()->create([
                'name' => 'Shipping Provider Admin',
                'email' => 'shipping.provider@green-leaf.com',
                'username' => 'shipping.provider.green-leaf',
                'status' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'avatar' => $f->imageUrl($width, $height, 'NOT USED', false),
                'cover_image' => $f->imageUrl($width, $height, 'NOT USED', false),
                'phone_number' => '00964123123125',
                'whatsapp' => '00964123123125',
                'website_url' => 'https://green-leaf.shipping.com',
                'facebook' => 'https://fb.com/green-leaf',
                'instagram' => 'https://instagram.com/green-leaf',
                'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.',
            ]);

        $admin = Admin::first();

        $Admin = Role::findOrCreate('Admin');
        $admin->syncRoles($Admin->id);


        foreach ( config('permission.permissions') as $permission) {
            Permission::findOrCreate($permission);
            $Admin->givePermissionTo($permission);
        }


    }
}

<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'api_token' => Str::random(80),

            'password' => '$2y$10$fcmW.0A4K26AHODY3i0SOuKYflnmnvTXR/AlHSdIM6j4VwY5zNvha',
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('user','admin');
    }
}

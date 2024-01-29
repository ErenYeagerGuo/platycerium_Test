<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $usersData = [
                [
                    'name' => 'student',
                    'email' => 'student@student.com',
                    'api_token' => Str::random(80),
                    'password' => '$2y$10$4FufZDa/rMIZx1IMfSlZj.DQAR3U1.DQECrphpTQrD3iPxJG4MKwG', // 密碼需使用 bcrypt 加密
                ],
                // 可以加入更多使用者資料...
            ];

            foreach ($usersData as $userData) {
                User::create($userData);
            }
        }
    }
}

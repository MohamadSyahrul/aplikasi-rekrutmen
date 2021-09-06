<?php

use App\Kuis;
use App\User;
use App\Loker;
use App\Soal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'username' => 'administrator',
            'password' => bcrypt('admin123'),
        ]);
    }
}

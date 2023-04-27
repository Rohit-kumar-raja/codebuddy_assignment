<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Rohit kumar',
            'email'=>'rohit83013@gmail.com',
            'user_type'=>'admin',
            'password'=>Hash::make('Rohit83013@#'),
        ]);
    }
}

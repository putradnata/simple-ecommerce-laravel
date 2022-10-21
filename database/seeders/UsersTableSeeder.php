<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'admin@test.com',
            'email' => 'admin@test.com',
            'password' => Hash::make('asdasd123'),
            'role' => 'A',
            'created_at' => Carbon::now(),
        ];

        User::create($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->delete();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Penumpang',
            'email' => 'passenger@example.com',
            'password' => Hash::make('123456'),
            'role' => 'passenger',
        ]);

        $this->command->info('Seeder selesai: 2 user dibuat (admin & penumpang)');
    }
}

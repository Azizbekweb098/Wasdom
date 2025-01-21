<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Azizbek',
            'phone' => '+998950363630',
            'password' => Hash::make('Azizbek987'),
        ]);
        User::create([
            'name' => 'webcoder',
            'phone' => '+998950363631',
            'password' => Hash::make('Azizbek987'),
        ]);
    }
}

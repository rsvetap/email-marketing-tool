<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Admin::updateOrCreate(['email' => 'test@test.test'], [
            'name'     => 'Admin',
            'surname'  => 'Surname',
            'email'    => 'test@test.test',
            'password' => Hash::make('12345678'),
            'is_active' => 1,
        ]);
    }
}

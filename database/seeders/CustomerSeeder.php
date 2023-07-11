<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Enums\CustomerSexEnum;
use Illuminate\Database\Seeder;

/**
 * Class CustomerSeeder
 */
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'email' => 'john@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'sex' => CustomerSexEnum::MALE,
            'birth_date' => '1990-01-01',
        ]);

        Customer::create([
            'email' => 'jane@example.com',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'sex' => CustomerSexEnum::FEMALE,
            'birth_date' => '1995-05-10',
        ]);

    }
}

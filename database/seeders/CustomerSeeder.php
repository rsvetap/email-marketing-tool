<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Enums\CustomerSexEnum;
use App\Models\CustomerGroup;
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
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 3 customer groups
        $groups = CustomerGroup::factory()->count(3)->create();

        // Create 10 customers
        $customers = Customer::factory()->count(10)->create();

        // Assign customers to different groups
        foreach ($customers as $customer) {
            // Assign the customer to a random group
            $group = $groups->random();
            $customer->groups()->attach(['group_id' => $group->id]);

            // For two customers, assign them to a second random group
            if ($customer->id <= 2) {
                $secondGroup = $groups->where('id', '!=', $group->id)->random();
                $customer->groups()->attach($secondGroup->id);
            }
        }
    }
}

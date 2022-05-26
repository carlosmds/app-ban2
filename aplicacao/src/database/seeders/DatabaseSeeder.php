<?php

namespace Database\Seeders;

use App\Models\Purchase;
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
        $this->call([
            CustomerSeeder::class,
            OrderSeeder::class,
            PurchaseSeeder::class,
            RentalSeeder::class,
            GameSeeder::class,
            OrderItemSeeder::class,
        ]);
    }
}

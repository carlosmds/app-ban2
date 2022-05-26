<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'customer_id' => 1,
                'closed'      => false,
                'description' => 'Rental for user 1',
            ],[
                'customer_id' => 2,
                'closed'      => false,
                'description' => 'Purchase and rentals for user 2',
            ],[
                'customer_id' => 3,
                'closed'      => false,
                'description' => 'Purchase for user 3',
            ],
        ]);
    }
}

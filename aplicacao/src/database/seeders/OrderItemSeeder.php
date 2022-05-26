<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->insert([
            [
                'order_id'    => 1,
                'game_id'     => 1,
                'purchase_id' => null,
                'rental_id'   => 1,
            ],[
                'order_id'    => 2,
                'game_id'     => 2,
                'purchase_id' => null,
                'rental_id'   => 2,
            ],[
                'order_id'    => 2,
                'game_id'     => 4,
                'purchase_id' => 1,
                'rental_id'   => null,
            ],[
                'order_id'    => 2,
                'game_id'     => 3,
                'purchase_id' => null,
                'rental_id'   => 3,
            ],[
                'order_id'    => 3,
                'game_id'     => 5,
                'purchase_id' => 2,
                'rental_id'   => null,
            ],
        ]);
    }
}

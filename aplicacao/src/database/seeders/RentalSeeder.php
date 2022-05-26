<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rentals')->insert([
            [
                'days_of_rent' => 10,
                'returned_at' => null,
            ],[
                'days_of_rent' => 5,
                'returned_at' => null,
            ],[
                'days_of_rent' => 30,
                'returned_at' => null,
            ],
        ]);
    }
}

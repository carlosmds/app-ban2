<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            [
                'name' => 'Red Dead Redemption II',
                'value' => '210.00',
                'day_rental_value' => '12.00',
            ],[
                'name' => 'GTA V',
                'value' => '140.00',
                'day_rental_value' => '9.00',
            ],[
                'name' => 'The Elder Scrolls V: Skyrim',
                'value' => '120.00',
                'day_rental_value' => '7.00',
            ],[
                'name' => 'Battlefield V',
                'value' => '220.00',
                'day_rental_value' => '13.00',
            ],[
                'name' => 'Minecraft',
                'value' => '80.00',
                'day_rental_value' => '5.00',
            ],
        ]);
    }
}

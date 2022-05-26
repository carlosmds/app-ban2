<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'id' => 1,
                'name' => 'João Silva',
                'date_of_birth' => '2000-06-18',
                'document' => '00915034000',
            ],
            [
                'id' => 2,
                'name' => 'João Fonseca',
                'date_of_birth' => '2002-02-13',
                'document' => '30935904000',
            ],
            [
                'id' => 3,
                'name' => 'Maria Joaquina',
                'date_of_birth' => '2001-03-02',
                'document' => '77528361097',
            ],
            [
                'id' => 4,
                'name' => 'Jade Picon',
                'date_of_birth' => '2001-04-07',
                'document' => '65151592009',
            ],
        ]);
    }
}

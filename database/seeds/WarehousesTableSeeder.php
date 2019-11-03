<?php

use Illuminate\Database\Seeder;

class WarehousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')->insert([
            'englishName' => 'Box 1',
            'arabicName' => 'الخبر',
            'branch_id' =>1,
        ]);
        DB::table('warehouses')->insert([
            'englishName' => 'Brdige 1',
            'arabicName' => 'الخبر',
            'branch_id' =>1,
        ]);

        DB::table('warehouses')->insert([
            'englishName' => 'Clinic 1',
            'arabicName' => 'الخبر',
            'branch_id' =>1,
        ]);
    }
}

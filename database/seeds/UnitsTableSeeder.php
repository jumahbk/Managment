<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'englishName' => 'Box',
            'arabicName' => 'علبه',
        ]);

        DB::table('units')->insert([
            'englishName' => 'Syringe',
            'arabicName' => 'ابره',
        ]);


        DB::table('units')->insert([
            'englishName' => 'MG',
            'arabicName' => 'مغ',
        ]);
    }
}

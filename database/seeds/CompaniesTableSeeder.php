<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'englishName' => 'Medart Clinics',
            'arabicName' => 'عيادات ميد ارت',
        ]);

    }
}

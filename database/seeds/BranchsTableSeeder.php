<?php

use Illuminate\Database\Seeder;

class BranchsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            'englishName' => 'Khobar',
            'arabicName' => 'الخبر',
            'company_id' =>1,
        ]);



    }
}

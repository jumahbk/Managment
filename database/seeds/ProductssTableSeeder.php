<?php

use Illuminate\Database\Seeder;

class ProductssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'arabicName' => 'بوتوكس',
            'englishName' => 'BOTOX',
            'low' => 10,
            'vendor_id' => 1,
            'unit_id' => 1,
        ]);

        DB::table('products')->insert([
            'arabicName' => 'فيلر',
            'englishName' => 'filler',
            'low' => 10,
            'vendor_id' => 1,
            'unit_id' => 1,
        ]);

        DB::table('products')->insert([
            'arabicName' => 'فايتمين',
            'englishName' => 'vitaime c',
            'low' => 10,
            'vendor_id' => 1,
            'unit_id' => 1,
        ]);
    }
}

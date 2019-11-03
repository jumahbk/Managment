<?php

use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
            'englishName' => Str::random(10),
            'arabicName' => Str::random(10),
        ]);
        DB::table('vendors')->insert([
            'englishName' => Str::random(10),
            'arabicName' => Str::random(10),
        ]);
        DB::table('vendors')->insert([
            'englishName' => Str::random(10),
            'arabicName' => Str::random(10),
        ]);
        DB::table('vendors')->insert([
            'englishName' => Str::random(10),
            'arabicName' => Str::random(10),
        ]);
    }
}

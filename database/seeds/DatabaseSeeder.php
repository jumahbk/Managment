<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
//        $this->call(CompaniesTableSeeder::class);
//        $this->call(VendorsTableSeeder::class);
//        $this->call(UnitsTableSeeder::class);
//        $this->call(BranchsTableSeeder::class);
//        $this->call(WarehousesTableSeeder::class);
//        $this->call(ProductssTableSeeder::class);
        $this->call(YearTableSeeder::class);


    }
}

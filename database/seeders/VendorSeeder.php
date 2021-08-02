<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0;$i<13;$i++)
            \DB::table('vendors')->insert([
                'name' => $faker->name(),
                'logo'=>'uploads\vendors\1.jpeg',
            ]);
    }
}

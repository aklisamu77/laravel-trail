<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for ($i=0;$i<3;$i++)
            \DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->safeEmail,
                'password' => \Hash::make('123'),
            ]);
    }
}

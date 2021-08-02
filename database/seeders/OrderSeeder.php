<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // `id`, `status`, `total_amount`, `discount`, `paid`, `payment_method`, `created_at`, `updated_at`, `user_id`
        $faker = \Faker\Factory::create();
        for ($i=2;$i<68;$i++){
            
            $total_amount   = $faker->randomFloat(2,1, 300);
            $discount       = rand(0,intval($total_amount));
            $paid           = $total_amount - $discount;
            
            \DB::table('orders')->insert([
                //'name'          => $faker->name(),
                'total_amount'  => $total_amount,#=> 181.843,
                'status'        => $faker->randomElement(['Proccing','Accepted','Pinding','Rejected','Canceled','shipped']),
                'discount'      => $discount ,
                'paid'          => $paid,
                'payment_method'    => $faker->randomElement(['COD','Visa','Paypal','MasterCard','Moyasser']),
                
                'user_id'       => \App\Models\User::all()->random()->id,
                
                
            ]);
        }
    }
}

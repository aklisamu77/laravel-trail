<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // `quantity`, `order_id`, `product_id`
        //for ($i=2;$i<68;$i++)
        {
            \DB::table('order_details')->insert([
                    //'name'          => $faker->name(),
                    'quantity'      => rand(1,5),#=> 181.843,
                    'product_id'    => \App\Models\Product::inRandomOrder()->first()->id,
                    
                    'order_id'       => \App\Models\Order::inRandomOrder()->first()->id,
                    
                    
                ]);
        }
    }
}

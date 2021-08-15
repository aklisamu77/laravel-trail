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
        
        //$order_id = 65;
        
        /*\DB::table('orders')->where('id', $order_id)->update([
                //'name'          => $faker->name(),
                'total_amount'  => $total_amount,#=> 181.843,
                'discount'=>9,
                'paid'=>8
            ]);*/
        for ($i=2;$i<68;$i++){
            
            $total_products = \App\Models\OrderDetail::where('order_id','=',$i)->get();
            $total_amount = 0;
            for ( $j=0;$j<count($total_products);$j++){
                $product_price = \App\Models\Product::where('id','=',$total_products[$j]['product_id'])->first()->price;
                $total_amount  += $total_products[$j]['quantity'] * $product_price;
                
            }
            
            $total_amount   = $total_amount;
            $discount       = rand(0,intval($total_amount));
            $paid           = $total_amount - $discount;
            
            \DB::table('orders')->where('id', $i)->update([
                //'name'          => $faker->name(),
                'total_amount'  => $total_amount,#=> 181.843,
                'discount'=>$discount,
                'paid'=>$paid
                
                
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ``, `price`, `color`, `logo`, `active`, `vendor_id`, `category_id`, `created_at`, `updated_at`
        $faker = \Faker\Factory::create();
        for ($i=2;$i<68;$i++){
            $Product = Product::findorFail($i);
            if (strpos($Product->logo,'1.jpg')){
                $Product->logo = str_replace('jpg','png',$Product->logo);
                $Product->save();
            }
        }
    }
}

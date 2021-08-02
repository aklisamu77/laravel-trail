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
            \DB::table('products')->insert([
                'name' => $faker->name(),
                'price' => $faker->randomFloat(2,1, 300) ,#=> 181.843,
                'color' => $faker->randomElement(["red","blue","green","yellow","black"]),
                'logo' => $faker->randomElement([
                            'uploads\products\1.png','uploads\products\2.png','uploads\products\3.jpg',
                            'uploads\products\4.jpg','uploads\products\5.jpg','uploads\products\6.jpg',
                            'uploads\products\7.jpg','uploads\products\8.png','uploads\products\9.jpg',
                            'uploads\products\10.jpg'
                            ]),
                'active' => 1,
                'vendor_id' => \App\Models\Vendor::all()->random()->id,
                'category_id' => \App\Models\Category::all()->random()->id,
                
                
            ]);
        }
    }
}

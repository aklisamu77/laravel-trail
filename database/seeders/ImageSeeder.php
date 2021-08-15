<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Image;
class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = Product::all();
        foreach($products as $product)
        \DB::table('images')->insert([
                'url' => $product->logo,
                'imageable_id' => $product->id ,#=> 181.843,
                'imageable_type' => 'App\Models\Product',
                
                
                
            ]);
    }
}

<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'=> 'Macbook Pro 1',
            'slug'=> 'macbook-pro-1',
            'details' => '15 inchies 1 TB SSD',
            'price' => '200.99',
            'present_price' => '100.99',
            'description' => 't is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. The point of using Lorem Ipsum is th',
            'feature_name' => 'Macbook pro 1',
            'feature_color' => 'Matte Black'

        ]);
        Product::create([
            'name'=> 'Macbook Pro 2',
            'slug'=> 'macbook-pro-2',
            'details' => '15 inchies 1 TB SSD',
            'price' => '200.99',
            'present_price' => '100.99',
            'description' => 't is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. The point of using Lorem Ipsum is th',
            'feature_name' => 'Macbook pro 2',
            'feature_color' => 'Matte Black'

        ]);
        Product::create([
            'name'=> 'Macbook Pro 3',
            'slug'=> 'macbook-pro-3',
            'details' => '15 inchies 1 TB SSD',
            'price' => '200.99',
            'present_price' => '100.99',
            'description' => 't is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. The point of using Lorem Ipsum is th',
            'feature_name' => 'Macbook pro 3',
            'feature_color' => 'Matte Black'

        ]);
        Product::create([
            'name'=> 'Macbook Pro 4',
            'slug'=> 'macbook-pro-4',
            'details' => '15 inchies 1 TB SSD',
            'price' => '200.99',
            'present_price' => '100.99',
            'description' => 't is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. The point of using Lorem Ipsum is th',
            'feature_name' => 'Macbook pro 4',
            'feature_color' => 'Matte Black'

        ]);
        Product::create([
            'name'=> 'Macbook Pro 5',
            'slug'=> 'macbook-pro-5',
            'details' => '15 inchies 1 TB SSD',
            'price' => '200.99',
            'present_price' => '100.99',
            'description' => 't is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. The point of using Lorem Ipsum is th',
            'feature_name' => 'Macbook pro 5',
            'feature_color' => 'Matte Black'

        ]);
    }
}

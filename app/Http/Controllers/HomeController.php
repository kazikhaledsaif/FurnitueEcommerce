<?php

namespace App\Http\Controllers;

use App\Product;
use App\FeaturedCategory;
use App\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $current = date('Y-m-d');
    // $current->modify('+1 day');
        $products = Product::latest()->take(10)->get();
        $products_rand = Product::inRandomOrder()->take(8)->get();
        // $products_weekly = Product::whereDate('weekly','$current')->get();
        $products_weekly = DB::select("SELECT * FROM `products` WHERE `weekly` > '$current' ");
        $featuredCategory = FeaturedCategory::take(4)->get();
        $top_sell = DB::select("SELECT  `product_id`,`name`,`slug`,`details`,`present_price`,`discount_price`,`product_image`,
                                    `badge`,`percentige`,
                                 COUNT(`product_id`) AS `value_occurrence` 
                        FROM     `order_products` JOIN `products` 
                        ON order_products.product_id = products.id
                        GROUP BY `product_id`
                        ORDER BY `value_occurrence` DESC
                        LIMIT    5;");


        $sliders = Slider::take(5)->get();

        return view('pages.index')->with([
            'new_products'=>$products,
            'random' =>$products_rand,
            'sliders' =>$sliders,
            'topsell' =>$top_sell,
            'weekly_product'=>$products_weekly,
            'featuredCategory'=>$featuredCategory
        ]);
    }
}

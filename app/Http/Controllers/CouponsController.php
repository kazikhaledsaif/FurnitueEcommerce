<?php

namespace App\Http\Controllers;

use App\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = Coupon::where('code', $request->coupon_code)->first();

        if(!$code){
            return redirect()->route('cart.index')->with('success_message', 'Invalid Coupon !');
        }

        session()->put('coupon', [
            'name' => $code->code,
            'amount' =>$code->discount(  Cart::subtotal(2,'.','')  )
        ]);

        return redirect()->route('cart.index')->with('success_message', 'Coupon Applied ');
         
    }
 
 
    public function destroy()    {
        
        session()->forget('coupon');
        return back()->with('success_message', 'Coupon has been removed.');
    }
}

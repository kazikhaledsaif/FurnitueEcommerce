<?php

namespace App\Http\Controllers;
use App\Order;
use App\OrderIndex;
use App\OrderProduct;

use App\User;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;

use Hash;
use Illuminate\Support\Facades\DB;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = Auth()->user()->id;

      $orders = Order::where('user_id', $uid)->orderBy('orders.id','DESC')->get();


    /*    $orders =  Order::join('order_indices', 'order.id','=','orders_indices.order_no')
            ->where('user_id', $uid)->orderBy('orders.id','DESC')->get();*/

        return view('auth.user-dashboard')->with([
            'orders'=>$orders
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    public function store(Request $request)
    {

        $user = User::findOrFail(Auth::id());

        if ($request->has('email')){
            $user->email = $request->email;
        }
         if ($request->has('name')){
            $user->name = $request->name;
        }

         if ($request->has('lname')){
            $user->lname = $request->lname;
        }
         if ($request->has('address')){
            $user->address = $request->address;
        }
         if ($request->has('mobile')){
            $user->mobile = $request->mobile;
        }

       // $user->password = \Hash::make($request->password);
        $user->save();




        return redirect('/my-account')->with('success_message','Account Details Update Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderIndex  $orderIndex
     * @return \Illuminate\Http\Response
     */
    public function show(OrderIndex $orderIndex)
    {
        //
    }

      
    public function pdfByCode(Request $request, $id){
        $order_no = OrderIndex::select('order_no')
                    ->where('order_indices.tracker', '=', $id)
                    ->get();


        if($order_no->isNotEmpty()){


            $ordered = Order::find($order_no);

            $orderno = $order_no[0]['order_no'];
            $product_list = DB::table('order_products')
                ->join('products','order_products.product_id','=', 'products.id')
                ->where('order_products.order_id', $orderno)
                ->get();
            $invoice = substr(md5('muaj'.$orderno.'saif'), 0, 15) ;
            $invoice = $invoice.'.pdf';


            $pdf = PDF::loadView('pages.invoice', [
                'order' => $ordered,
                'id' => $orderno,
                'product_list' =>$product_list
            ]);

            return $pdf->stream('invoice_'.$invoice);
        }
        else{
            return redirect()->route('page.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderIndex  $orderIndex
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderIndex $orderIndex)
    {
        //
    }
}

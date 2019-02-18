<?php
namespace App\Http\Controllers\Voyager;
use App\Order;
use Validator;
use App\Product;
use App\Category;
use App\CategoryProduct;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
class OrdersController extends VoyagerBaseController
{
    //***************************************
    //                _____
    //               |  __ \
    //               | |__) |
    //               |  _  /
    //               | | \ \
    //               |_|  \_\
    //
    //  Read an item of our Data Type B(R)EAD
    //
    //****************************************
    public function show(Request $request, $id)
    {
        $slug = $this->getSlug($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;
        $relationships = $this->getRelationships($dataType);
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $dataTypeContent = call_user_func([$model->with($relationships), 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }
        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);
        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'read');
        // Check permission
        $this->authorize('read', $dataTypeContent);
        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);
        $view = 'voyager::bread.read';
        if (view()->exists("voyager::$slug.read")) {
            $view = "voyager::$slug.read";
        }
         $order = Order::find($id);
         // $products = $order->products();
         $product_list = DB::table('order_products')->where('order_id', $order->id)->get();
         $product_list = DB::table('order_products')
                        ->join('products','order_products.product_id','=', 'products.id')
                        ->where('order_products.order_id', $order->id)
                        ->get();
         // $products = DB::table('products')->where('id', $product_list->product_id)->get();

         

   // return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable','products' ));
   return Voyager::view($view, compact('dataType','order', 'id', 'product_list' ));
    }



}
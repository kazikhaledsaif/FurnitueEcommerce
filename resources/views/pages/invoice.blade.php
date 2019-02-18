 


 <h1>FurnitureVille Texas</h1>
 <pre>
    845 I-35E, DeSoto, 
    TX-75115, USA

+1 972-230-0511</pre>
 <div class="clearfix"></div>
 <div class="row">
    <div class="col-md-6">
        <!-- <h1> Order No. {{ $id }} </h1> -->
        <h3> Order : {{ substr(md5('muaj'.$id.'saif'), 16, 31) }} </h3>
        <p>Invoice # FVT{{ substr(md5('muaj'.$id.'saif'), 0, 15) }}</p>

         
         
    </div> 
    <div class="col-md-4"></div>
    <div class="col-md-2">
        <br>
        Status :
         @if( $order[0]->status)
            <span class="alert-info" align='right'>{{ $order[0]->status}}</span>
         <br>
         @endif
         
    </div>
 </div>
    
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=0;
                $total = 0;
                @endphp
         @foreach($product_list as $product)
                    <tr>
                        @php
                            $no = $no+1;

                            if ($product->discount_price == 0 )
                            $total = $total + $product->present_price* $product->quantity;
                            else
                            $total = $total + $product->discount_price* $product->quantity;

                        @endphp
                        <td> {{ $no }}</td>
                        <td> {{ $product->id }} </td>
                        <td> <a target="_blank" href="{{route('shop.show',$product->slug)}}" style="text-decoration: none;">{{ $product->name }}</a></td>
                        <td> {{ $product->quantity }} </td>
                        @if ($product->discount_price == 0)
                            <td> $ {{ $product->present_price }} </td>
                            <td> $ {{ $product->present_price * $product->quantity }} </td>
                        @else
                            <td> $ {{ $product->discount_price }} </td>
                            <td> $ {{ $product->discount_price * $product->quantity }} </td>
                        @endif
                    </tr>
           @endforeach
        <tr style="background-color: #96C2CA;  color:black; font-size: 1.1em;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Sub-Total</td>
            <td> $ {{ $total }}</td>
        </tr>
        </tbody>
    </table>

    <div class="clearfix"></div>
<div class="row">
    <div class="col-md-6 col-sm-12">
        Order Details:
<pre>
    Name: {{ $order[0]->billing_first_name}} {{ $order[0]->billing_last_name}}
    Email: {{ $order[0]->billing_email}}
    Phone: {{ $order[0]->billing_phone_no}}
    Shipping Address: {{ $order[0]->billing_address}}
    Town : {{ $order[0]->billing_town}}
    City : {{ $order[0]->billing_city}}
    Zip code : {{ $order[0]->billing_zip_code}}
</pre>  
    </div>
    <div class="col-md-6 col-sm-12">
        Billing Details:
<pre>
    Payment Method: {{ $order[0]->billing_payment_gateway}}
    Order Sub total: {{ $order[0]->billing_subtotal}}
    Shipping Cost: {{ $order[0]->billing_shipping_cost}}
    Total amount: {{ $order[0]->billing_total}}
</pre>
    </div>
</div>





 @extends('voyager::master')

@section('page_title', 'Sales Report')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> Sales Report
        </h1>
 
    </div>
@stop

 @php
  use App\Order;
  use App\Product;
  use App\OrderProducts;
  use Illuminate\Support\Facades\DB;

  $currentYear= Date('Y');
  $currentMonth = Date('m');
  $currentDate = Date('Y-m-d');

  $totalsell = Order::where('status', 'approve')->sum('billing_subtotal');
  $totalItem = Order::join('order_products','orders.id','=','order_products.order_id')
                        ->where('status', 'approve')->count();


  $dailySell = Order::whereDate('created_at', '=', $currentDate)
                        ->where('status', 'approve')
                        ->sum('billing_subtotal');

  $dailyItem = Order::whereDate('created_at', '=', $currentDate) 
                        ->where('status', 'approve')
                        ->count();

  $monthlySell = Order::whereYear('created_at', '=', $currentYear)
                        ->whereMonth('created_at', '=', $currentMonth)
                        ->where('status', 'approve')
                        ->sum('billing_subtotal');

 $monthlyItem = Order::whereYear('created_at', '=', $currentYear)
  						->whereMonth('created_at', '=', $currentMonth)
                        ->where('status', 'approve')
  						->count();

  $totaldiscount = Order::where('status', '=', 'approve')->sum('billing_discount');
  $discountUsed = Order::where('status', '=', 'approve')->where('billing_discount')->count();


 $hotsell = DB::select("SELECT  `product_id`,`name`,`slug`,`stock`,`present_price`,`discount_price` ,
                                 COUNT(`product_id`) AS `occurrence` 
                        FROM     `order_products` JOIN `products` 
                        ON order_products.product_id = products.id
                        GROUP BY `product_id`
                        ORDER BY `occurrence` DESC
                        LIMIT    10;");




 @endphp




@section('content')
    <div class="page-content browse container-fluid">
    	<div class="row">
    		<div class="col-md-3">
                <div class="panel panel-bordered">
                    <div class="panel-body bg-primary text-center">
                    	<h4>Total Revenue</h4>
                        <h2 align="center">{{ $totalsell }} $</h2>
                        <p>{{ $totalItem }} Items sold overall</p>
                    </div>
                </div>
    		</div>
            <div class="col-md-3">
                <div class="panel panel-bordered">
                    <div class="panel-body  text-center bg-danger">
                        <h4>Sale on {{ $currentDate }}</h4>
                        <h2 align="center">{{ $dailySell }} $</h2>
                        <p> {{ $dailyItem }} Item(s)</p>
                    </div>
                </div>
            </div> 
    		<div class="col-md-3">
                <div class="panel panel-bordered">
                    <div class="panel-body bg-info text-center">
                        <h4>{{ Date('F')}} Report</h4>
                    	<h2 align="center">{{ $monthlySell }} $</h2>
                    	<p> {{ $monthlyItem }}  Item(s)</p>
                    </div>
                </div>
    		</div> 
    		<div class="col-md-3">
                <div class="panel panel-bordered">
                    <div class="panel-body bg-danger text-center">

                    	<h4>Total Discount used </h4>
                        <h2 align="center">{{ $totaldiscount }} $</h2>
                        <p> {{ $discountUsed }} times used discount coupon </p>
                    </div>
                </div>
    		</div>
    	</div>

        <div class="row">
            <div class="col-md-6 ">
                <div class="panel panel-bordered">
                    <h2 align="center">Ordered Products list</h2>
                    <div class="panel-body">
                         
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        @can('delete',app($dataType->model_name))
                                            <th>
                                                <input type="checkbox" class="select_all">
                                            </th>
                                        @endcan
                                        @foreach($dataType->browseRows as $row)
                                        <th>
                                            @if ($isServerSide)
                                                <a href="{{ $row->sortByUrl() }}">
                                            @endif
                                            {{ $row->display_name }}
                                            @if ($isServerSide)
                                                @if ($row->isCurrentSortField())
                                                    @if (!isset($_GET['sort_order']) || $_GET['sort_order'] == 'asc')
                                                        <i class="voyager-angle-up pull-right"></i>
                                                    @else
                                                        <i class="voyager-angle-down pull-right"></i>
                                                    @endif
                                                @endif
                                                </a>
                                            @endif
                                        </th>
                                        @endforeach
                                        <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataTypeContent as $data)
                                    <tr>
                                        @can('delete',app($dataType->model_name))
                                            <td>
                                                <input type="checkbox" name="row_id" id="checkbox_{{ $data->getKey() }}" value="{{ $data->getKey() }}">
                                            </td>
                                        @endcan
                                        @foreach($dataType->browseRows as $row)
                                            
                                            <td>
                                                @if($row->type == 'image')
                                                    <img src="@if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:100px">
                                                @elseif($row->type == 'relationship')
                                                    @include('voyager::formfields.relationship', ['view' => 'browse','options' => $row->details])
                                                @elseif($row->type == 'select_multiple')
                                                    @if(property_exists($row->details, 'relationship'))

                                                        @foreach($data->{$row->field} as $item)
                                                            @if($item->{$row->field . '_page_slug'})
                                                                <a href="{{ $item->{$row->field . '_page_slug'} }}">{{ $item->{$row->field} }}</a>@if(!$loop->last), @endif
                                                            @else
                                                                {{ $item->{$row->field} }}
                                                            @endif
                                                        @endforeach

                                                    @elseif(property_exists($row->details, 'options'))
                                                        @if (count(json_decode($data->{$row->field})) > 0)
                                                            @foreach(json_decode($data->{$row->field}) as $item)
                                                                @if (@$row->details->options->{$item})
                                                                    {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            {{ __('voyager::generic.none') }}
                                                        @endif
                                                    @endif

                                                @elseif($row->type == 'select_dropdown' && property_exists($row->details, 'options'))

                                                    @if($data->{$row->field . '_page_slug'})
                                                        <a href="{{ $data->{$row->field . '_page_slug'} }}">{!! $row->details->options->{$data->{$row->field}} !!}</a>
                                                    @else
                                                        {!! isset($row->details->options->{$data->{$row->field}}) ?  $row->details->options->{$data->{$row->field}} : '' !!}
                                                    @endif

                                                @elseif($row->type == 'select_dropdown' && $data->{$row->field . '_page_slug'})
                                                    <a href="{{ $data->{$row->field . '_page_slug'} }}">{{ $data->{$row->field} }}</a>
                                                @elseif($row->type == 'date' || $row->type == 'timestamp')
                                                    {{ property_exists($row->details, 'format') ? \Carbon\Carbon::parse($data->{$row->field})->formatLocalized($row->details->format) : $data->{$row->field} }}
                                                @elseif($row->type == 'checkbox')
                                                    @if(property_exists($row->details, 'on') && property_exists($row->details, 'off'))
                                                        @if($data->{$row->field})
                                                            <span class="label label-info">{{ $row->details->on }}</span>
                                                        @else
                                                            <span class="label label-primary">{{ $row->details->off }}</span>
                                                        @endif
                                                    @else
                                                    {{ $data->{$row->field} }}
                                                    @endif
                                                @elseif($row->type == 'color')
                                                    <span class="badge badge-lg" style="background-color: {{ $data->{$row->field} }}">{{ $data->{$row->field} }}</span>
                                                @elseif($row->type == 'text')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div class="readmore">{{ mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</div>
                                                @elseif($row->type == 'text_area')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div class="readmore">{{ mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</div>
                                                @elseif($row->type == 'file' && !empty($data->{$row->field}) )
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    @if(json_decode($data->{$row->field}))
                                                        @foreach(json_decode($data->{$row->field}) as $file)
                                                            <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}" target="_blank">
                                                                {{ $file->original_name ?: '' }}
                                                            </a>
                                                            <br/>
                                                        @endforeach
                                                    @else
                                                        <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($data->{$row->field}) }}" target="_blank">
                                                            Download
                                                        </a>
                                                    @endif
                                                @elseif($row->type == 'rich_text_box')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div class="readmore">{{ mb_strlen( strip_tags($data->{$row->field}, '<b><i><u>') ) > 200 ? mb_substr(strip_tags($data->{$row->field}, '<b><i><u>'), 0, 200) . ' ...' : strip_tags($data->{$row->field}, '<b><i><u>') }}</div>
                                                @elseif($row->type == 'coordinates')
                                                    @include('voyager::partials.coordinates-static-image')
                                                @elseif($row->type == 'multiple_images')
                                                    @php $images = json_decode($data->{$row->field}); @endphp
                                                    @if($images)
                                                        @php $images = array_slice($images, 0, 3); @endphp
                                                        @foreach($images as $image)
                                                            <img src="@if( !filter_var($image, FILTER_VALIDATE_URL)){{ Voyager::image( $image ) }}@else{{ $image }}@endif" style="width:50px">
                                                        @endforeach
                                                    @endif
                                                @else
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <span>{{ $data->{$row->field} }}</span>
                                                @endif
                                            </td>
                                        @endforeach
                                        <td class="no-sort no-click" id="bread-actions">
                                            @foreach(Voyager::actions() as $action)
                                                @include('voyager::bread.partials.actions', ['action' => $action])
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($isServerSide)
                            <div class="pull-left">
                                <div role="status" class="show-res" aria-live="polite">{{ trans_choice(
                                    'voyager::generic.showing_entries', $dataTypeContent->total(), [
                                        'from' => $dataTypeContent->firstItem(),
                                        'to' => $dataTypeContent->lastItem(),
                                        'all' => $dataTypeContent->total()
                                    ]) }}</div>
                            </div>
                            <div class="pull-right">
                                {{ $dataTypeContent->appends([
                                    's' => $search->value,
                                    'filter' => $search->filter,
                                    'key' => $search->key,
                                    'order_by' => $orderBy,
                                    'sort_order' => $sortOrder
                                ])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="panel panel-bordered">
                	<h2 align="center">Top 10 selling Products</h2>
                    <div class="panel-body">
                         
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-dark table-bordered table-hover ">
                                <thead class="bg-danger">
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Dist. Price</th>
                                        <th>Stock</th>
                                        <th>Sold</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	 
                                      @foreach($hotsell as $hot)
                                     <tr>
                                     	 <td>{{ $hot->name }}</td>
                                     	 <td style="  text-decoration: line-through;">{{ $hot->present_price }}</td>
                                     	 <td>{{ $hot->discount_price }}</td>
                                     	 <td>{{ $hot->stock }}</td>
                                     	 <td>{{ $hot->occurrence }}</td>
                                     </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                
            </div>        
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->display_name_singular) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('css')
.bg-second{
    background: red!important;
}

@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@endif
@stop

@section('javascript')
    <!-- DataTables -->
    @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    @endif
    <script>
        $(document).ready(function () {
            @if (!$dataType->server_side)
                var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => [],
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [['targets' => -1, 'searchable' =>  false, 'orderable' => false]],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
            @else
                $('#search-input select').select2({
                    minimumResultsForSearch: Infinity
                });
            @endif

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            @endif
            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked'));
            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', ['id' => '__id']) }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });
    </script>
@stop

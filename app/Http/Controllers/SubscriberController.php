<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SubscriberController extends Controller
{
    //
    public function export()
    {
        return Excel::download(new UsersExport, 'subscriber.csv',\Maatwebsite\Excel\Excel::CSV);
    }
}

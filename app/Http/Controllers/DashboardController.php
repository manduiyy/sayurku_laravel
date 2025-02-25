<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('pages.admin.dashboard',
        [
                  'current_page' => 'dashboard',
                  'javascript_file' => '',
                  'data_list' => Order::all(),
                  'page_title' => 'Dashboard'
              ]
        );
    }
}

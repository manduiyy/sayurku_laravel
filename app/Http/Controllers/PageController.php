<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.main.home',
            [
                'current_page' => 'home',
                'products' => Product::all(),
                'javascript_file' => 'main/home.js'
            ]
        );
    }

    public function about()
    {

    }

    public function products()
    {

    }

    public function blogs()
    {

    }

    public function order()
    {
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Navigation;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.main.home',
            [
                'current_page' => 'home',
                'navigations' => Navigation::where('category', 'public')->where('status', 'show')->get(),
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

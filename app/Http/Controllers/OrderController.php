<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function submitOrder(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_number' =>'required',
            'email' => 'required|email',
            'address' => 'required',
            'order_detail' => 'required',
        ]);

        try{

            Order::create($validatedData);

            return response()->json([
                "status" => "success"
            ],201);

        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => $e->getMessage()
            ],422);
        }
    }

    public function show($order_id){
        return view('pages.admin.order_detail',
      [
                'current_page' => 'order',
                'javascript_file' => '',
                'detail' => Order::find($order_id),
                'page_title' => 'Order Detail'
            ]              
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {

    }

    /**
     * Create an order
     */
    public function store(Request $request) {
        $order = new Order([
            'status' => 0,
        ]);
        $order->save();
        
        $order->products()->sync($request->get('products') ?? []);
    }

    /**
     * Get orders list by filter
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function getList(Request $request): JsonResponse
    {
       $status = $request->get('status');
       
       if ($status) {
        $order_query = Order::where('status', $status);
        $orders = $order_query->get()->load('products');

        return response()->json($orders);
       }

       $orders = Order::get()->load('products');
       return response()->json($orders); 
    }

}

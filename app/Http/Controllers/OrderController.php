<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use Log;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->check()) {
            return redirect('login');
            
        } 
        $currentUser = auth()->user();

        // $products = Product::where('quantity', '!=', 0);

        // $searchKey = $request->search;

        // if ($searchKey) {
        //     $products = $products->where('name', 'like', '%' . $searchKey . '%');
        // }

        // $products = $products->paginate(12);

        // if ($searchKey) {
        //     $products->appends(['search' => $searchKey]);
        //}

        return view('orders.index', [
            // 'products' => $products,
        ]);
    }


    public function store(Request $request)
    {

        $productId = $request->product_id;
        $product = Product::find($productId);

        if (!$product) {
            return json_encode([
                'status' => false,
                'msg' => 'Product has been deleted.',
            ]);
        }

        if (!auth()->check()) {
            return json_encode([
                'status' => false,
                'msg' => 'Need login.',
            ]);
        }

        $currentUserId = auth()->id();
        $new = config('order.status.new');

        $order = Order::where('user_id', $currentUserId)
            ->where('status', $new)
            ->first();

        if ($order) {
            $totalPrice = $order->total_price + $product->price;
        } else {
            $totalPrice = $product->price;
        }

        try {
            $isCreateProductOrder = false;

            if (!$order) {
                $orderData = [
                    'user_id' => $currentUserId,
                    'total_price' => $totalPrice,
                    'status' => $new,
                ];

                $order = Order::create($orderData);
                $isCreateProductOrder = true;
            } else {
                $productOrder = ProductOrder::where('order_id', $order->id)
                    ->where('product_id', $product->id)
                    ->first();

                if ($productOrder) {
                    $productOrder->increment('quantity');
                } else {
                    $isCreateProductOrder = true;
                }

                $order->update([
                    'total_price' => $totalPrice,
                ]);
            }

            if ($isCreateProductOrder) {
                $productOrderData = [
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'price' => $product->price,
                    'quantity' => 1,
                ];

                ProductOrder::create($productOrderData);
            }
        } catch (\Exception $e) {
            Log::error($e);
        }

        return json_encode([
            'status' => true,

        ]);
    }

    public function update() {
        // TODO
    }
}

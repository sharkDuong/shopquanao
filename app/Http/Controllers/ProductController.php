<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::where('quantity', '!=', 0);

        $searchKey = $request->search;

        if ($searchKey) {
            $products = $products->where('name', 'like', '%' . $searchKey . '%');
        }

        $products = $products->paginate(12);

        if ($searchKey) {
            $products->appends(['search' => $searchKey]);
        }

        return view('products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', [
            'product' => $product,
        ]);
    }
}

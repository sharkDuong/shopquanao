<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->paginate(20);

        return view('admin.products.index', [
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
    

    

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', [
            'product' => $product,
        ]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->only([
            'name',
            'code',
            'price',
            'quantity',
        ]);

        try {
            $product->update($data);
        } catch (\Exception $e) {
            \Log::error($e);

            return back()->withInput($data)
                ->with('error', 'Update failed!');
        }

        return redirect()->route('admin.products.edit', $product->id)
            ->with('status', 'Update success!');
    }

    











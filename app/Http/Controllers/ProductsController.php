<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        // $products = Product::get()->paginate(10); // not used for now

        $products = Product::get();

        return view('product.cards', [
            'products' => $products,
        ]);
    }


    public function show($id)
    {

        $product = Product::findOrFail($id);

        return view('product.single', [
            'product' => $product,
        ]);
    }

}

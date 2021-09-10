<?php

namespace App\Http\Livewire;

use App\Models\Product;

use Livewire\Component;

class ManageProducts extends Component
{
    public function render()
    {

        $products = Product::get();

        return view('livewire.manage-products', [
            'products' => $products,
        ]);
    }
}

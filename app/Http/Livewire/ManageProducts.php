<?php

namespace App\Http\Livewire;

use App\Models\Product;

use Livewire\Component;
use Livewire\WithPagination;

class ManageProducts extends Component
{

    use WithPagination;

    public function render()
    {

        $products = Product::paginate(8);

        return view('livewire.manage-products', [
            'products' => $products,
        ]);
    }

    // this method is called from the front as in:
    // <span wire:click="destroy({{ $p->id }})">Delete</span>
    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        $product->delete();
        // That's it - the table in the front will auto-update without page reload

    }
}

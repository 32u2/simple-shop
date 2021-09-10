<?php

namespace App\Http\Livewire;

use App\Models\Product;

use Livewire\Component;

class ManageProducts extends Component
{

    public $products;
    /**
      * - any public vars, or collections ($products above) in this class are accessible in the template
      * - any method in this controller can be called directly from the template
      * - should any method change the public variable, the front will instantly update without page reload
      * - the best of all, all updates are plain html (not JSON), so fully SEO friendly
      * - livewire offers illusion of the SPA, without its SEO pitfalls
    */


    public function render()
    {

        $this->products = Product::get();

        return view('livewire.manage-products', [
            'products' => $this->products,
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

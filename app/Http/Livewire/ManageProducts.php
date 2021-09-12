<?php

namespace App\Http\Livewire;

use App\Models\Product;

use Livewire\Component;
use Livewire\WithPagination;

class ManageProducts extends Component
{

    use WithPagination;

    protected $listeners = ['deleteProduct' => 'deleteProduct'];

    public function deleteProduct($id) {
        $product = Product::findOrFail($id);
        $image_path = $product->image_path;
        $product->delete();
        // That's it - the product table in the front will auto-update without page reload

        // Lastly, remove image file, but not the default no-image-available.png
        $file_fqn = base_path('public/' . $image_path);
        if (!strpos($file_fqn, 'no-image-available')) {
            unlink($file_fqn);
        }
    }

    public function render()
    {
        $products = Product::paginate(8);
        return view('livewire.manage-products', [
            'products' => $products,
        ]);
    }

}

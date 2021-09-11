<?php

namespace App\Http\Livewire;

use App\Models\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProduct extends Component
{

    use WithFileUploads;

    public $product, $name, $price, $description, $photo;


    protected $listeners = ['imageUploaded' => 'processImage'];

    public function processImage($data)
    {
        $folderPath = public_path('img/');

        $image_parts = explode(";base64,", $data);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath.$imageName;

        file_put_contents($imageFullPath, $image_base64);

        $this->product->image_path = '/img/' . $imageName;
        $this->product->save();

        $this->photo = '/img/' . $imageName;

    }



    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->description = $this->product->description;

        $this->photo = $this->product->image_path;
    }

    public function render()
    {
        return view('livewire.update-product')->layout('layouts.app');
    }

    public function submit()
    {

        $validatedData = $this->validate([
            'name' => 'required|min:2',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $this->product->update($validatedData);

    }

}

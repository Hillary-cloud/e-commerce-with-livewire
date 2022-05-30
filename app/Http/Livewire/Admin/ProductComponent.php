<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        session()->flash('message','Product removed successfully');
    }

    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.product-component',compact('products'))->layout('layouts.base');
    }
}

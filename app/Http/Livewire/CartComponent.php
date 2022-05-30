<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function delete($rowId){
        $product = Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('status','Item has been removed from Cart');
    }

    public function deleteAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}

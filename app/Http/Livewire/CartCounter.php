<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounter extends Component
{
    public function render()
    {
        $cart_count = \Cart::getContent()->count();
        return view('livewire.cart-counter', compact('cart_count'));
    }
}

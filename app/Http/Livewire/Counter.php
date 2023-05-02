<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $max;
 
    /* public function mount($max)
    {
        $this->max = $max;
    } */

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        if ($this->count > 0)
        $this->count--;
    }

    public function updated($name,$value)
    {
        if ($value < 0 || substr($value,0,1) == 0) {
          $this->count = 0;  
        }
        if ($value > $this->max) {
            $this->count = $this->max;
        }
    }
 
    public function render()
    {
        return view('livewire.counter');
    }
}

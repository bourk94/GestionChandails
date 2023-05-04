<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ArticleCampagne;
use Illuminate\Support\Facades\DB;

class Counter extends Component
{
    public $count = 0;
    public $max;
 
    public function mount($idarticle)
    {
        $this->max = DB::table('article_campagne')->where('article_id', $idarticle)->value('quantite_max');
    }

    protected $rules = [
        'count' => 'required', 'integer', 'min:0'
    ];

    public function increment()
    {
        $this->count++;
        if ($this->count > $this->max) {
            $this->count = $this->max;
        }
    }

    public function decrement()
    {
        if ($this->count > 0) {
            $this->count--; 
        }
        if ($this->count > $this->max) {
            $this->count = $this->max;
        }
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

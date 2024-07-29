<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;
use App\Models\Step;

class EditStep extends Component
{

    public $steps = [];

    public function increment() {  
        $this->steps[] = ['id' => -1,'name' => ''];    
    }

   public function remove($index)
    {
        $step = $this->steps[$index];
        if (isset($step['id']) && $step['id'] !== -1) {
            Step::where('id', $step['id'])->delete();
        }
        unset($this->steps[$index]);
    }

    public function mount($steps)
    {
        $this->steps = $steps->toArray();
    }

    public function render()
    {
        return view('livewire.edit-step');
    }
}

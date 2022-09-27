<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FrontPage extends Component
{
    public $name = 'ridoy paul';

    public function render()
    {
        return view('livewire.front-page');
        
    }
}

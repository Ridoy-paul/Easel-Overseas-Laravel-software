<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Brands;

class Sidebar extends Component
{
    public function render()
    {
        $brands = Brands::where('is_active', 1)->orderBy('serial_num', 'asc')->get(['name', 'icon']);
        return view('livewire.sidebar', compact('brands'));
    }
}

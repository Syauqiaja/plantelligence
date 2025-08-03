<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.blank")]
class EsaiDeskriptif extends Component
{
    public function render()
    {
        return view('livewire.esai-deskriptif');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class PageTest extends Component
{
    public $pageTitles = ['Materi 1: Sel dan Air pada Tumbuhan', 'Materi 2: Keseimbangan Air dalam Tubuh Tumbuhan', 'Materi 3: Nutrisi dan Transport Nutrisi pada Tumbuhan'];
    public function render()
    {
        return view('livewire.page-test');
    }
}

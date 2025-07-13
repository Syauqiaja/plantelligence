<?php

namespace App\Livewire;

use Livewire\Component;

class PageTest extends Component
{
    public $pageTitles = ['Materi 1: Air dan Sel Tumbuhan', 'Materi 2: Transpirasi', 'Materi 3: Nutrisi dan Transport'];
    public function render()
    {
        return view('livewire.page-test');
    }
}

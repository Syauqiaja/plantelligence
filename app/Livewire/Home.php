<?php

namespace App\Livewire;

use App\Models\TaskField;
use Livewire\Component;

class Home extends Component
{
    public $pageTitles = ['Materi 1: Air dan Sel Tumbuhan', 'Materi 2: Transpirasi', 'Materi 3: Nutrisi dan Transport'];
    public function render()
    {
        return view('livewire.home');
    }
}

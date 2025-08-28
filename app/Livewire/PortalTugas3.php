<?php

namespace App\Livewire;

use App\Enums\StudentTaskKey;
use App\Models\StudentTask;
use Livewire\Component;

class PortalTugas3 extends Component
{
    public $pageTitle = 'Portal Tugas & Uji Kompetensi';
    public $tasks = [];

    public function mount(){
        $this->tasks[4] = StudentTask::byKey(StudentTaskKey::ORGANIZE_STUDY);
    }
    public function render()
    {
        return view('livewire.portal-tugas3');
    }
}

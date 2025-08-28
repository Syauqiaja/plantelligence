<?php

namespace App\Livewire;

use App\Enums\StudentTaskKey;
use App\Models\StudentTask;
use Livewire\Component;

class PortalTugas2 extends Component
{
    public $pageTitle = 'Portal Tugas & Uji Kompetensi';
    public $tasks = [];

    public function mount(){
        $this->tasks[3] = StudentTask::byKey(StudentTaskKey::ORIENT_PROBLEM);
    }
    public function render()
    {
        return view('livewire.portal-tugas2');
    }
}

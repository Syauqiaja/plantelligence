<?php

namespace App\Livewire;

use App\Enums\StudentTaskKey;
use App\Models\StudentTask;
use Livewire\Component;

class PortalTugas4 extends Component
{
    public $pageTitle = 'Portal Tugas & Uji Kompetensi';
    public $tasks = [];

    public function mount()
    {
        $this->tasks[5] = StudentTask::byKey(StudentTaskKey::INVESTIGATION);
    }
    public function render()
    {
        return view('livewire.portal-tugas4');
    }
}

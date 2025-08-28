<?php

namespace App\Livewire;

use App\Enums\StudentTaskKey;
use App\Models\StudentTask;
use Livewire\Component;

class PortalTugas5 extends Component
{
    public $pageTitle = 'Portal Tugas & Uji Kompetensi';
    public $tasks = [];

    public function mount()
    {
        $this->tasks[6] = StudentTask::byKey(StudentTaskKey::DEVELOP_EXHIBITS);
    }
    public function render()
    {
        return view('livewire.portal-tugas5');
    }
}

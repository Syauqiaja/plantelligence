<?php

namespace App\Livewire;

use App\Enums\StudentTaskKey;
use App\Models\StudentTask;
use Livewire\Component;

class PortalTugas7 extends Component
{
    public $pageTitle = 'Portal Tugas & Uji Kompetensi';
    public $tasks = [];

    public function mount()
    {
        $this->tasks[8] = StudentTask::byKey(StudentTaskKey::STUDENT_OWNERSHIP);
    }
    public function render()
    {
        return view('livewire.portal-tugas7');
    }
}

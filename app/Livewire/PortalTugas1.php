<?php

namespace App\Livewire;

use App\Enums\StudentTaskKey;
use App\Models\StudentTask;
use Livewire\Component;

class PortalTugas1 extends Component
{
    public $pageTitle = 'Portal Tugas & Uji Kompetensi';
    public $tasks = [];

    public function mount(){
        $this->tasks[0] = StudentTask::byKey(StudentTaskKey::ANGKET_SOL_AWAL);
        $this->tasks[1] = StudentTask::byKey(StudentTaskKey::ANGKET_LITERASI_AWAL);
        $this->tasks[2] = StudentTask::byKey(StudentTaskKey::PRETEST_LITERASI);
    }

    public function render()
    {
        return view('livewire.portal-tugas1');
    }
}

<?php

namespace App\Livewire;

use App\Enums\StudentTaskKey;
use App\Models\StudentTask;
use Livewire\Component;

class PortalTugas8 extends Component
{
    public $pageTitle = 'Portal Tugas & Uji Kompetensi';
    public $tasks = [];

    public function mount()
    {
        $this->tasks[9] = StudentTask::byKey(StudentTaskKey::POSTTEST_LITERASI);
        $this->tasks[10] = StudentTask::byKey(StudentTaskKey::ANGKET_SOL_AKHIR);
        $this->tasks[11] = StudentTask::byKey(StudentTaskKey::ANGKET_LITERASI_AKHIR);
    }
    public function render()
    {
        return view('livewire.portal-tugas8');
    }
}

<?php

namespace App\Livewire;

use App\Enums\StudentTaskKey;
use App\Models\StudentTask;
use Livewire\Component;

class PortalTugas6 extends Component
{
    public $pageTitle = 'Portal Tugas & Uji Kompetensi';
    public $tasks = [];

    public function mount()
    {
        $this->tasks[7] = StudentTask::byKey(StudentTaskKey::ANALYZE_EVALUATE);
    }
    public function render()
    {
        return view('livewire.portal-tugas6');
    }
}

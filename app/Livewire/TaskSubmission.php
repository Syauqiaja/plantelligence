<?php

namespace App\Livewire;

use App\Models\StudentTaskAssignment;
use App\Models\TaskField;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class TaskSubmission extends Component
{
    use WithFileUploads;
    public TaskField $taskField;
    #[Rule(['required', 'file'])]
    public $file;
    public function render()
    {
        return view('livewire.task-submission');
    }
    
    #[On('taskSubmission')]
    public function taskSubmission($id){
        $this->taskField = TaskField::find($id);
    }

    public function save(){
        $this->validate();

        $filePath = $this->file->store('user_assignment', 'public');

        StudentTaskAssignment::updateOrCreate([
            'task_field_id' => $this->taskField->id,
            'user_id' => Auth::user()->id,
        ], [
            'file' => $filePath,
            'is_completed' => true,
        ]);

        $this->dispatch('closeModal', 'taskSubmissionModal');
        $this->dispatch('taskFieldUpdated', $this->taskField->id);
        $this->reset();
        Toaster::success('Berhasil menyelesaikan tugas');
    }
}

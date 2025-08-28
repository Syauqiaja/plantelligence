<?php

namespace App\Livewire;

use App\Models\StudentTask;
use App\Models\StudentTaskAssignment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class TaskAssignmentField extends Component
{
    public StudentTask $studentTask;
    public $number;


    public function render()
    {
        return view('livewire.task-assignment-field');
    }

    public function completeTask($id){
        StudentTaskAssignment::updateOrCreate([
            'user_id' => Auth::user()->id,
            'task_field_id' => $id,
        ], [
            'is_completed' => true,
        ]);
    }

    #[On('taskFieldUpdated')]
    public function taskFieldUpdated(){
        $this->studentTask = StudentTask::find($this->studentTask->id);
    }
}

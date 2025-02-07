<?php

namespace App\Livewire\Subject;

use App\FormTrait;
use App\Livewire\Forms\SubjectForm;
use Livewire\Component;

class Create extends Component
{
    use FormTrait;
    public SubjectForm $form;

    public function mount($fields, $action)
    {
        $this->action = $action;
        $this->fields = $fields;
    }

    public function render()
    {
        return view('livewire.subject.create');
    }
}

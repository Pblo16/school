<?php

namespace App\Livewire\Subject;

use App\FormTrait;
use App\Livewire\Forms\SubjectForm;
use App\Models\Subject;
use Livewire\Component;

class Edit extends Component
{
    use FormTrait;
    public SubjectForm $form;


    public function mount(Subject $data, $fields, $action)
    {
        $this->action = $action;
        $this->fields = $fields;
        $this->form->setForm($data);
    }
    
    public function render()
    {
        return view('livewire.subject.edit');
    }
}

<?php

namespace App\Livewire\Students;

use App\FormTrait;
use App\Livewire\Forms\StudentsForm;
use App\Models\Students;
use Livewire\Component;

class Edit extends Component
{
    use FormTrait;
    public StudentsForm $form;


    public function mount(Students $data, $fields)
    {
        $this->action = 'update';
        $this->fields = $fields;
        $this->form->setForm($data);
    }

    public function render()
    {
        return view('livewire.students.edit');
    }
}

<?php

namespace App\Livewire\Students;

use App\FormTrait;
use App\Livewire\Forms\StudentsForm;
use Livewire\Component;

class Create extends Component
{
    use FormTrait;
    public StudentsForm $form;

    public function mount($fields)
    {
        $this->action = 'store';
        $this->fields = $fields;
    }

    public function render()
    {
        return view('livewire.students.create');
    }
}

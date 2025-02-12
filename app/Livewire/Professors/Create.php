<?php

namespace App\Livewire\Professors;

use App\FormTrait;
use App\Livewire\Forms\ProfessorsForm;
use Livewire\Component;

class Create extends Component
{
    use FormTrait;

    public ProfessorsForm $form;

    public function mount($fields, $action)
    {
        $this->action = $action;
        $this->fields = $fields;
    }

    public function render()
    {
        return view('livewire.professors.create');
    }
}

<?php

namespace App\Livewire\Professors;

use App\FormTrait;
use App\Livewire\Forms\ProfessorsForm;
use App\Models\Professors;
use Livewire\Component;

class Edit extends Component
{
    use FormTrait;

    public ProfessorsForm $form;

    public function mount(Professors $data, $fields, $action)
    {
        $this->action = $action;
        $this->fields = $fields;
        $this->form->setForm($data);
    }

    public function render()
    {
        return view('livewire.professors.edit');
    }
}

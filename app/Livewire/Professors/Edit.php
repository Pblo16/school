<?php

namespace App\Livewire\Professors;

use App\FormTrait;
use App\Livewire\Forms\ProfessorsForm;
use Livewire\Component;
use App\Models\Professors;

class Edit extends Component
{
    use FormTrait;
    public ProfessorsForm $form;


    public function mount(Professors $data, $fields)
    {
        $this->action = 'update';
        $this->fields = $fields;
        $this->form->setForm($data);
    }

    public function render()
    {
        return view('livewire.professors.edit');
    }
}

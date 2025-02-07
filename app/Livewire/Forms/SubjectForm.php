<?php

namespace App\Livewire\Forms;

use App\Models\Subject;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SubjectForm extends Form
{
    //
    public ?Subject $data;

    #[Validate('required|max:13')]
    public $nombre = '';

    public function setForm(Subject $data)
    {
        $this->data = $data;
        $this->nombre = $data->nombre;
    }

    public function store()
    {
        $this->validate();

        Subject::create($this->all());
    }

    public function update()
    {
        $this->validate();

        $this->data->update(
            $this->all()
        );
    }
}

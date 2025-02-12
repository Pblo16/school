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

    #[Validate('required')]
    public $professor_id;

    public function setForm(Subject $data)
    {
        $this->data = $data;
        $this->nombre = $data->nombre;
        $this->professor_id = $data->professor_id;
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

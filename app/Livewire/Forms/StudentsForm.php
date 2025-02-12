<?php

namespace App\Livewire\Forms;

use App\Models\Students;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StudentsForm extends Form
{
    public ?Students $data;

    #[Validate('required|max:13')]
    public $nombre = '';

    #[Validate('required|max:13')]
    public $apellido_paterno = '';

    #[Validate('required|max:13')]
    public $apellido_materno = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|min:8')]
    public $password = '';

    #[Validate('required')]
    public $fecha = '';
    /* #[Validate('required')]
    public $is_active = ''; */

    public function setForm(Students $data)
    {
        $this->data = $data;
        $this->nombre = $data->nombre;
        $this->apellido_paterno = $data->apellido_paterno;
        $this->apellido_materno = $data->apellido_materno;
        $this->email = $data->email;
        $this->password = $data->password;
        $this->fecha = $data->fecha;
        /* $this->is_active = $data->is_active; */
    }

    public function store()
    {
        $this->validate();

        Students::create($this->all());
    }

    public function update()
    {
        $this->validate();

        $this->data->update(
            $this->all()
        );
    }
}

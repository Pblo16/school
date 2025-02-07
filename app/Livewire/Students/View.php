<?php

namespace App\Livewire\Students;

use App\Services\StudentsService;
use App\WithDataTable;
use Livewire\Component;

class View extends Component
{
    use WithDataTable;
    public $fields = [
        'nombre' => [
            'label' => 'Nombre',
            'model' => 'nombre',
            'placeholder' => 'Ingresar el nombre',
            'span' => 4,
        ],
        'apellido_paterno' => [
            'label' => 'Apellido paterno',
            'model' => 'apellido_paterno',
            'placeholder' => 'Ingresar apellido paterno',
            'span' => 4,
        ],
        'apellido_materno' => [
            'label' => 'Apellido materno',
            'model' => 'apellido_materno',
            'placeholder' => 'Ingresar apellido materno',
            'span' => 4,
        ],
        'email' => [
            'label' => 'Email',
            'type' => 'email',
            'model' => 'email',
            'placeholder' => 'Ingresar email',
            'span' => 3,
        ],
        'password' => [
            'label' => 'Contraseña',
            'type' => 'password',
            'model' => 'password',
            'placeholder' => 'Ingresar contraseña',
            'span' => 4,
            'onedit' => [
                'disabled' => true,
                'hidden' => true,
            ]
        ],
        'fecha' => [
            'type' => 'date',
            'label' => 'Fecha de inicio',
            'placeholder' => 'Ingresar la fecha de inicio',
            'model' => 'fecha',
            'span' => 3,
        ],
    ];

    public function boot(StudentsService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $this->id = session('id');
        $this->headers = [
            ['key' => 'nombre', 'label' => 'Nombre', 'searchable' => true],
            ['key' => 'email', 'label' => 'Correo', 'searchable' => true],
        ];

        $this->searchable = collect($this->headers)
            ->where('searchable', true)
            ->pluck('key')
            ->toArray();
    }

    public function create()
    {
        return $this->redirectRoute('students', ['action' => 'create'], navigate: true);
    }

    public function edit($id)
    {
        session(['id' => $id]);
        return $this->redirectRoute('students', ['action' => 'edit'], navigate: true);
    }


    public function render()
    {
        return view('livewire.students.view', [
            'data' => $this->service->getAll(
                $this->perPage,
                $this->search,
                $this->searchable
            ),
            'fields' => $this->fields,
            'id' => $this->id,
        ]);
    }
}

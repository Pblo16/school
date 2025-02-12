<?php

namespace App\Livewire\Subject;

use App\Models\Subject;
use App\Services\SubjectService;
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
        'professor_id' => [
            'label' => 'Profesor',
            'model' => 'professor_id',
            'placeholder' => 'Ingresar el profesor',
            'span' => 4,
            'type' => 'select',
            'apiroute' => 'api.professors',
        ],
    ];

    public function boot(SubjectService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $this->id = session('id');
        $this->headers = [
            ['key' => 'nombre', 'label' => 'Nombre', 'searchable' => true],
        ];
        $this->title = 'Materias';
        $this->searchable = collect($this->headers)
            ->where('searchable', true)
            ->pluck('key')
            ->toArray();
    }

    public function create()
    {
        return $this->redirectRoute('subject', ['action' => 'create'], navigate: true);
    }

    public function edit($id)
    {
        $subject = Subject::with('professor')->findOrFail($id);
        session(['id' => $subject]);

        return $this->redirectRoute('subject', ['action' => 'edit'], navigate: true);
    }

    public function render()
    {
        return view('livewire.subject.view', [
            'data' => $this->service->getAll(
                $this->perPage,
                $this->search,
                $this->searchable
            ),
            'fields' => $this->fields,
        ]);
    }
}

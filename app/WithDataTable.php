<?php

namespace App;

use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

trait WithDataTable
{
    use WireUiActions;
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    protected $service;

    public $headers;

    public $policy;

    public $perPage = 10; // Default value

    public $actions = [];

    public $title;

    public $search = '';

    public $searchable = [];

    public $action = '';

    public $id = '';

    public $route;

    public function updatedPerPage($value)
    {
        $this->resetPage();
    }

    public function updating($name, $value)
    {
        if ($name === 'search') {
            $this->resetPage();
        }
    }

    public function initializeDataTable()
    {
        $this->id = session('id');

        $this->searchable = collect($this->headers)
            ->where('searchable', true)
            ->pluck('key')
            ->toArray();
    }

    public function delete($id): void
    {
        $this->dialog()->confirm([
            'title' => '¿Deseas eliminar la información?',
            'icon' => 'warning',
            'description' => 'Eliminar item',
            'acceptLabel' => 'Aceptar',
            'method' => 'handleDelete',
            'params' => $id,
        ]);
    }

    public function create()
    {
        return $this->redirectRoute($this->route, ['action' => 'create'], navigate: true);
    }

    public function edit($id)
    {
        session(['id' => $id]);

        return $this->redirectRoute($this->route, ['action' => 'edit'], navigate: true);
    }

    public function handleDelete($id)
    {
        try {
            $this->service->delete($id);
            $this->notification()->success('Registro eliminado correctamente');
        } catch (\Exception $e) {
            $this->notification()->error('Error al eliminar el registro');
        }
    }
}

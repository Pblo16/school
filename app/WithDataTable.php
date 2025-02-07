<?php

namespace App;

use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

trait WithDataTable
{
    use WithPagination;
    use WireUiActions;

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

    public function initializeDataTable($headers, $policy)
    {
        $this->headers = $headers;
        $this->policy = $policy;
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

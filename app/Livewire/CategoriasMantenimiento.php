<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class CategoriasMantenimiento extends Component
{
    use WithPagination;
    
    public $perPage = 10;
    public $totalRegistros = 0;

    public $search = '';
    public $showModal = false;
    
    // Campos del formulario
    public $idCategoria;
    public $idUsuario = 1; // Cambiar según el usuario autenticado
    public $nombre;
    public $color = '#000000';
    public $estado = 1;
    public $observacion;
    
    public $isEdit = false;

    protected $rules = [
        'idUsuario' => 'required|integer',
        'nombre' => 'required|string|max:100',
        'color' => 'nullable|string|max:7',
        'estado' => 'required|integer',
        'observacion' => 'nullable|string',
    ];

    #[On('search-updated')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    #[On('edit-record')]
    public function edit($id)
    {
        $result = DB::select('EXEC sp_CrudCategorias @accion = ?, @idCategoria = ?', [1, $id]);
        
        if (!empty($result)) {
            $categoria = $result[0];
            $this->idCategoria = $categoria->idCategoria;
            $this->idUsuario = $categoria->idUsuario;
            $this->nombre = $categoria->nombre;
            $this->color = $categoria->color;
            $this->estado = $categoria->estado;
            $this->observacion = $categoria->observacion;
            
            $this->isEdit = true;
            $this->showModal = true;
        }
    }

    #[On('delete-record')]
    public function delete($id)
    {
        DB::statement('EXEC sp_CrudCategorias @accion = ?, @idCategoria = ?, @usuario_modificacion = ?', 
            [4, $id, 'admin']);
        
        session()->flash('message', 'Categoría eliminada correctamente');
    }

    public function create()
    {
        $this->resetForm();
        $this->isEdit = false;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->isEdit) {
            DB::statement('EXEC sp_CrudCategorias @accion = ?, @idCategoria = ?, @idUsuario = ?, @nombre = ?, @color = ?, @estado = ?, @observacion = ?, @usuario_modificacion = ?',
                [3, $this->idCategoria, $this->idUsuario, $this->nombre, $this->color, $this->estado, $this->observacion, 'admin']);
            
            session()->flash('message', 'Categoría actualizada correctamente');
        } else {
            DB::statement('EXEC sp_CrudCategorias @accion = ?, @idUsuario = ?, @nombre = ?, @color = ?, @estado = ?, @observacion = ?, @usuario_creacion = ?',
                [2, $this->idUsuario, $this->nombre, $this->color, $this->estado, $this->observacion, 'admin']);
            
            session()->flash('message', 'Categoría creada correctamente');
        }

        $this->closeModal();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->idCategoria = null;
        $this->nombre = '';
        $this->color = '#000000';
        $this->estado = 1;
        $this->observacion = '';
    }

    public function render()
    {
        $paginaActual = $this->getPage();
        
        $categorias = DB::select('EXEC sp_CrudCategorias @accion = ?, @idUsuario = ?, @nombre = ?, @estado = ?, @paginaActual = ?, @cantidadPorPagina = ?', 
            [1, $this->idUsuario, $this->search ?: null, null, $paginaActual, $this->perPage]);

        // Obtener total de registros del primer resultado
        $this->totalRegistros = !empty($categorias) ? $categorias[0]->TotalRegistros : 0;

        $data = array_map(function($cat) {
            return [
                'id' => $cat->idCategoria,
                'idCategoria' => $cat->idCategoria,
                'nombre' => $cat->nombre,
                'color' => $cat->color,
                'estado' => $cat->estado,
                'observacion' => $cat->observacion,
            ];
        }, $categorias);

        $columns = [
            ['field' => 'idCategoria', 'label' => 'ID'],
            ['field' => 'nombre', 'label' => 'Nombre'],
            ['field' => 'color', 'label' => 'Color'],
            ['field' => 'estado', 'label' => 'Estado'],
        ];

        // Crear un LengthAwarePaginator manualmente
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $data,
            $this->totalRegistros,
            $this->perPage,
            $paginaActual,
            ['path' => request()->url(), 'pageName' => 'page']
        );

        return view('livewire.categorias-mantenimiento', [
            'columns' => $columns,
            'data' => $data,
            'paginator' => $paginator,
            'totalRegistros' => $this->totalRegistros
        ])->layout('layouts.app');
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
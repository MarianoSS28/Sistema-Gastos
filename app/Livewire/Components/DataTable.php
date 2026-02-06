<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public $columns = [];
    public $data = [];
    public $actions = true;
    public $perPage = 10;

    public function render()
    {
        return view('livewire.components.data-table');
    }

    public function edit($id)
    {
        $this->dispatch('edit-record', id: $id);
    }

    public function delete($id)
    {
        $this->dispatch('delete-record', id: $id);
    }
}
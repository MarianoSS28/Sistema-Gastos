<?php

namespace App\Livewire\Components;

use Livewire\Component;

class DataTable extends Component
{
    public $columns = [];
    public $data = [];
    public $actions = true;

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
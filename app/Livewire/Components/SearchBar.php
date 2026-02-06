<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SearchBar extends Component
{
    public $search = '';
    public $placeholder = 'Buscar...';

    public function updatedSearch()
    {
        $this->dispatch('search-updated', search: $this->search);
    }

    public function render()
    {
        return view('livewire.components.search-bar');
    }
}
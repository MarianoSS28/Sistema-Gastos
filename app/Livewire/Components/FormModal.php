<?php

namespace App\Livewire\Components;

use Livewire\Component;

class FormModal extends Component
{
    public $show = false;
    public $title = 'Formulario';
    public $saveEvent = 'form-saved';
    
    public function save()
    {
        $this->dispatch($this->saveEvent);
    }

    public function close()
    {
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.components.form-modal');
    }
}
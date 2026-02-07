<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ConfirmModal extends Component
{
    public $show = false;
    public $title = '¿Confirmar acción?';
    public $message = '¿Está seguro de continuar?';
    public $confirmText = 'Confirmar';
    public $cancelText = 'Cancelar';
    public $confirmEvent = 'confirmed';

    public function confirm()
    {
        $this->dispatch($this->confirmEvent);
        $this->show = false;
    }

    public function cancel()
    {
        $this->dispatch('cancel-delete'); 
    }

    public function render()
    {
        return view('livewire.components.confirm-modal');
    }
}
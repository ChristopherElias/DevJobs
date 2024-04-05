<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarVacante extends Component
{

    public $vacante;
    public $postulado;

    public function render()
    {
        return view('livewire.mostrar-vacante');
    }
}

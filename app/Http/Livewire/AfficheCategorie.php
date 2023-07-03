<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AfficheCategorie extends Component
{
    public $categories ;
    public function render()
    {
        return view('livewire.affiche-categorie');
    }
}

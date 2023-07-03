<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ComposantCategorie extends Component
{

    public function redirectToPage()
{
    return redirect()->route('affiche_categorie.affiche_categorie');
}
    public function render()
    {
        return view('livewire.composant-categorie');
    }
}

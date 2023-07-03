<?php

namespace App\Http\Livewire;

use App\Models\Annonce;
use Livewire\Component;

class LivewireAfficheAnnonceAdmin extends Component
{
    public $annonces = [] ;

    public $isLoading = false;

    public function loadPosts()
    {
        $this->isLoading = true;

        $this->annonces = Annonce::orderBy('created_at',"desc")->get();

        $this->isLoading = false;


    }
    public function render()
    {
        return view('livewire.livewire-affiche-annonce-admin');
    }
}

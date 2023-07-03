<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categorie;

class LiveCaregorie extends Component
{
    public $categories = [] ;

    public $isLoading = false;

    public function loadPosts()
    {
        $this->isLoading = true;

        $this->categories = Categorie::all() ;

        $this->isLoading = false;
        

    }

    public function render()
    {

        return view('livewire.live-caregorie');
    }
}

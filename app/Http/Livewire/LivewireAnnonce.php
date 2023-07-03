<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LivewireAnnonce extends Component
{
    // public $annonce ;

    public $annonce;
    public $isLoading = false;

    public function loadPosts()
    {

        $this->isLoading = true;



        $this->isLoading = false;


    }

    public function addfav(){

        if(auth()->check()){
            $f = User::find(Auth::user()->id);

        $f->likes()->toggle($this->annonce->id);

    } else{
            // notification
            $this->emit('flash','merci de vous connecter !','error');
        }

    }

    public function render()
    {
        return view('livewire.livewire-annonce');
    }
}

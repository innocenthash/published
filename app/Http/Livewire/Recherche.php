<?php

namespace App\Http\Livewire;

use App\Models\Annonce;
use Livewire\Component;

class Recherche extends Component
{
    public String $query='' ;

    // on recupere ici
    public $annonces=[] ;

    public Int $selectedIndex = 0 ;

    public function incrementIndex() {

        if ($this->selectedIndex===count($this->annonces)-1) {
              $this->selectedIndex = 0 ;
              return ;
        }
        $this->selectedIndex++;
    }

    public function decrementIndex(){

        if($this->selectedIndex===0) {
         $this->selectedIndex=(count($this->annonces)-1) ;
         return ;
        }
        $this->selectedIndex--;
    }

    public function updatedQuery(){
        $words = '%'.$this->query.'%' ;


        if (strlen($this->query)>2) {
            $this->annonces=Annonce::where('offres','like',$words)->where('statut',1)->get() ;
        }


    }

    public function resetIndex(){
        $this->reset('selectedIndex');
    }

    public function voir_annonce(){
        //  dd($this->annonces);


        if($this->annonces){
               return redirect()->route('annonces.voir' , [$this->annonces[$this->selectedIndex]['id']]) ;
        }



    }


    public function render()
    {
        return view('livewire.recherche');
    }
}

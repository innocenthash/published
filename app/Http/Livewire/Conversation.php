<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Conversation extends Component
{

    protected $listeners = ["sent"=>'$refresh'] ;
    public $conversation ;
    public $message ;

    public function mount($conversation ){
        $this->conversation = $conversation ;

    }

    public function sendMessage(){
        $message = new Message() ;

        $message->user_id = Auth::user()->id ;

        $message->conversation_id =   $this->conversation->id ;

        $message->contenue = $this->message ;
        $message->save() ;


     $this->reset('message');
     $this->emit('sent') ;
     $this->emit('messageReceived');

    }


    public function render()
    {
        return view('livewire.conversation');
    }
}

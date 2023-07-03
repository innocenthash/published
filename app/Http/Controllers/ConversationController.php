<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function conversation(){
        // pour afficher de le debut
   $conversations = Conversation::where('from',Auth::user()->id)->orWhere('to',Auth::user()->id)->get();


        return view('conversation.conversation',compact('conversations')) ;
    }

    public function messages(Conversation $conversation){

        // dd($conversation);

        return view('conversation.affiche_message',compact('conversation')) ;
    }
}

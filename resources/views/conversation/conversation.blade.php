@extends('layouts.app_annoceurs')

@section('title')
   Conversation
@endsection

@section('conversation_css')
<style>
    body{margin-top:20px;}

.chat-online {
    color: #34ce57
}

.chat-offline {
    color: #e4606d
}

.chat-messages {
    display: flex;
    flex-direction: column;
    max-height: 800px;
    overflow-y: scroll
}

.chat-message-left,
.chat-message-right {
    display: flex;
    flex-shrink: 0
}

.chat-message-left {
    margin-right: auto
}

.chat-message-right {
    flex-direction: row-reverse;
    margin-left: auto
}
.py-3 {
    padding-top: 1rem!important;
    padding-bottom: 1rem!important;
}
.px-4 {
    padding-right: 1.5rem!important;
    padding-left: 1.5rem!important;
}
.flex-grow-0 {
    flex-grow: 0!important;
}
.border-top {
    border-top: 1px solid #dee2e6!important;
}
</style>


@endsection
@section('conversation')


      @foreach ($conversations as $conversation)
               {{-- @foreach ($conversation->messages as  $message)
                 <h1>{{$message->contenue}}</h1>
               @endforeach --}}




      @endforeach



    <div class="row justify-center">
         <div class="col-12 col-sm-6 col-md-4">
                @if ($conversations->count()>0)
                <div class="card shadow-lg">
                    <div class="card-header bg-gradient-to-r from-pink-500 text-white font-extrabold text-lg to-yellow-500 text-center">Mes conversations</div>
                    <div class="card-body flex-row items-center justify-center">

                        <div class="hover:bg-neutral-50 border items-center border-5 h-20 border-gray-800 rounded-md ">

                            <a href="{{url('/affiche_message/'.$conversation->id)}}" class="nav-link  hover:text-teal-600">
                                <div  class=" mt-1">  {{-- pour recuperer le dernier message --}}
                                    <div class="hover:bg-neutral-50 pb-2 pl-2 flex">
                                       {{-- <div class="badge bg-success float-right">5</div> --}}
                                  <div class="border border-5 border-gray-800 {{Auth::user()->id==$conversation->messages->last()->user->id  ? 'bg-sky-500 text-white rounded-full h-12 w-12 ' : "bg-teal-600 rounded-full h-12 w-12 text-center  text-white "}}">
                                    <p class="text-center mt-2 ">{{Auth::user()->id==$conversation->messages->last()->user->id  ? 'Moi ' : $conversation->messages->last()->user->name}} </p>
                                  </div>



                                       <p class="mx-12 mt-2 " >{{Illuminate\Support\str::limit($conversation->messages->last()->contenue,50)}} </p>
                                       <p class=" ml-auto mt-2 "> <strong>{{$conversation->messages->last()->created_at->diffForHumans()}}</strong></p>
                                    </div>
                                </div>
                            </a>

                        </div>

                    </div>
                    {{-- <div class="card-footer">Footer</div> --}}
                  </div>

                @else

                <div class="card bg-light text-dark mt-44 ">
                    <div class="card-body bg-clip-text text-transparent bg-gradient-to-r from-rose-900 to-teal-700 text-lg text-center ">Conversation vide</div>
                </div>

                @endif
         </div>
    </div>

@endsection

<div class="">



<div class="row justify-center">
    <div class="col-12 col-md-6 ">
        <div class="card hover:shadow-md ">
            <div class="card-header text-center font-extrabold text-lg text-white  bg-gradient-to-r from-pink-500 to-yellow-500"><strong>Messages</strong></div>
            <div class="card-body">

                <div class="row ">
                    <div class="col-12 col-lg-12 col-xl-12 mx-auto ">
                        {{-- <div class="py-2 px-4 border-bottom d-none d-lg-block  mx-auto">
                            <div class="d-flex align-items-center py-1">
                                {{-- <div class="position-relative">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                </div> --}}
                                {{-- <div class="flex-grow-1 pl-3">
                                    <strong> Annonce : {{$conversation->annonce->offres}}</strong>
                                    {{-- <div class="text-muted small"><em>Typing...</em></div> --}}
                                {{-- </div> --}}

                                {{-- <div>
                                    <button class="btn btn-primary btn-lg mr-1 px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone feather-lg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></button>
                                    <button class="btn btn-info btn-lg mr-1 px-3 d-none d-md-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video feather-lg"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></button>
                                    <button class="btn btn-light border btn-lg px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal feather-lg"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></button>
                                </div> --}}
                            {{-- </div>
                        </div> --}}

                        <div class="  bg-white overflow-auto h-80  ">

                             @foreach ($conversation->messages as $message)
                           <div id ="chat-container" class="  w-50 {{$message->user->id==Auth::user()->id ? ' bg-pink-500 text-white mr-auto my-2 border shadow-md  rounded-full' : 'my-2 bg-yellow-500 text-white ml-auto  border rounded-full shadow-sm '}}">
                           <p class="mx-8">{{$message->user->id ==Auth::user()->id ? 'vous avez dit : ' : $message->user->name . ' a dit :'}}</p>

                           <p  class="mx-8">
                            {{$message->contenue}}
                           </p>
                            </div>


                            @endforeach





                    </div>



                 </div>
                </div>



            </div>
            <div class="card-footer">
                <div class="row ">
                    <div class="col-12 col-lg-12 col-xl-12 border-top mt-4  mx-auto">
                        <form wire:submit.prevent="sendMessage">
                            <div class="input-group">
                                <textarea class="form-control ring-slate-500 focus:ring-gray-500 focus:ring-0 w-40" required wire:keydown.enter.prevent='sendMessage' wire:model="message"></textarea>
                                <button type="submit" class="btn bg-violet-500 text-white ">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>


    </div>
</div>



</div>

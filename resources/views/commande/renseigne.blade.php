@extends('layouts.app_annoceurs')

@section('title')
   Question
@endsection

@section('question')
      <div class="row bg-white  mt-24">
        <div class="col-12   ">
            <div x-data="{open:false}" class="mx-auto my-24 w-50">
                <div class="container">
                    {{-- <h2>Card Header and Footer</h2> --}}
                    <div class="card ">
                      <div class="card-header bg-gradient-to-r from-pink-500 to-yellow-500">
                        <a href="#"  class="nav-link text-white   hover:text-teal-600" @click="open=!open">
                        Cliquez ici
                        </a>
                    </div>
                    <form action="{{url('/commande_envoie/'.$annonce_id)}}" method="post" x-show='open' x-cloak>
                      <div class="card-body ">

                            @csrf

                            <input type="hidden" name="annonce_id" value="{{$annonce_id}}">
                            <select class="form-control focus:outline-none focus:ring focus:border-none focus:ring-white "  name="select">
                                <option value="choix1"></option>
                                <option value="Cette annonce est-encore disponible ?">Cette annonce est-encore disponible ?</option>
                                <option value="Est-il possible de discuter avec quelqu'un ?">Est-il possible de discuter avec quelqu'un ?</option>
                            </select>
                             {{-- <textarea name="question" class="form-control  focus:outline-none focus:ring focus:border-none focus:ring-white ">

                             </textarea> --}}


                      </div>
                      <div class="card-footer">
                        <button type="submit" class=" text-sm  hover:bg-rose-600 transform-gpu transition delay-150 duration-300 ease-in-out focus:outline-none focus:ring focus:border-none focus:ring-white border rounded-lg text-white   btn-lg bg-gradient-to-r from-pink-500 to-yellow-500 mt-2">envoyer ma question</button>
                      </div>
                    </form>
                    </div>
                  </div>




             </div>
        </div>
      </div>
@endsection

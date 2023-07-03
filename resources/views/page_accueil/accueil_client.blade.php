@extends('layouts.app_annoceurs')
@section('title')
Page d'accueil
@endsection
@section('accueil_css')
<style>

       /*!
 * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
 * Copyright 2015 Daniel Cardoso <@DanielCardoso>
 * Licensed under MIT
 */
.la-ball-spin-clockwise,
.la-ball-spin-clockwise > div {
    position: relative;
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
}
.la-ball-spin-clockwise {
    display: block;
    font-size: 0;
    color: #fff;
}
.la-ball-spin-clockwise.la-dark {
    color: #333;
}
.la-ball-spin-clockwise > div {
    display: inline-block;
    float: none;
    background-color: currentColor;
    border: 0 solid currentColor;
}
.la-ball-spin-clockwise {
    width: 32px;
    height: 32px;
}
.la-ball-spin-clockwise > div {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 8px;
    height: 8px;
    margin-top: -4px;
    margin-left: -4px;
    border-radius: 100%;
    -webkit-animation: ball-spin-clockwise 1s infinite ease-in-out;
       -moz-animation: ball-spin-clockwise 1s infinite ease-in-out;
         -o-animation: ball-spin-clockwise 1s infinite ease-in-out;
            animation: ball-spin-clockwise 1s infinite ease-in-out;
}
.la-ball-spin-clockwise > div:nth-child(1) {
    top: 5%;
    left: 50%;
    -webkit-animation-delay: -.875s;
       -moz-animation-delay: -.875s;
         -o-animation-delay: -.875s;
            animation-delay: -.875s;
}
.la-ball-spin-clockwise > div:nth-child(2) {
    top: 18.1801948466%;
    left: 81.8198051534%;
    -webkit-animation-delay: -.75s;
       -moz-animation-delay: -.75s;
         -o-animation-delay: -.75s;
            animation-delay: -.75s;
}
.la-ball-spin-clockwise > div:nth-child(3) {
    top: 50%;
    left: 95%;
    -webkit-animation-delay: -.625s;
       -moz-animation-delay: -.625s;
         -o-animation-delay: -.625s;
            animation-delay: -.625s;
}
.la-ball-spin-clockwise > div:nth-child(4) {
    top: 81.8198051534%;
    left: 81.8198051534%;
    -webkit-animation-delay: -.5s;
       -moz-animation-delay: -.5s;
         -o-animation-delay: -.5s;
            animation-delay: -.5s;
}
.la-ball-spin-clockwise > div:nth-child(5) {
    top: 94.9999999966%;
    left: 50.0000000005%;
    -webkit-animation-delay: -.375s;
       -moz-animation-delay: -.375s;
         -o-animation-delay: -.375s;
            animation-delay: -.375s;
}
.la-ball-spin-clockwise > div:nth-child(6) {
    top: 81.8198046966%;
    left: 18.1801949248%;
    -webkit-animation-delay: -.25s;
       -moz-animation-delay: -.25s;
         -o-animation-delay: -.25s;
            animation-delay: -.25s;
}
.la-ball-spin-clockwise > div:nth-child(7) {
    top: 49.9999750815%;
    left: 5.0000051215%;
    -webkit-animation-delay: -.125s;
       -moz-animation-delay: -.125s;
         -o-animation-delay: -.125s;
            animation-delay: -.125s;
}
.la-ball-spin-clockwise > div:nth-child(8) {
    top: 18.179464974%;
    left: 18.1803700518%;
    -webkit-animation-delay: 0s;
       -moz-animation-delay: 0s;
         -o-animation-delay: 0s;
            animation-delay: 0s;
}
.la-ball-spin-clockwise.la-sm {
    width: 16px;
    height: 16px;
}
.la-ball-spin-clockwise.la-sm > div {
    width: 4px;
    height: 4px;
    margin-top: -2px;
    margin-left: -2px;
}
.la-ball-spin-clockwise.la-2x {
    width: 64px;
    height: 64px;
}
.la-ball-spin-clockwise.la-2x > div {
    width: 16px;
    height: 16px;
    margin-top: -8px;
    margin-left: -8px;
}
.la-ball-spin-clockwise.la-3x {
    width: 96px;
    height: 96px;
}
.la-ball-spin-clockwise.la-3x > div {
    width: 24px;
    height: 24px;
    margin-top: -12px;
    margin-left: -12px;
}
/*
 * Animation
 */
@-webkit-keyframes ball-spin-clockwise {
    0%,
    100% {
        opacity: 1;
        -webkit-transform: scale(1);
                transform: scale(1);
    }
    20% {
        opacity: 1;
    }
    80% {
        opacity: 0;
        -webkit-transform: scale(0);
                transform: scale(0);
    }
}
@-moz-keyframes ball-spin-clockwise {
    0%,
    100% {
        opacity: 1;
        -moz-transform: scale(1);
             transform: scale(1);
    }
    20% {
        opacity: 1;
    }
    80% {
        opacity: 0;
        -moz-transform: scale(0);
             transform: scale(0);
    }
}
@-o-keyframes ball-spin-clockwise {
    0%,
    100% {
        opacity: 1;
        -o-transform: scale(1);
           transform: scale(1);
    }
    20% {
        opacity: 1;
    }
    80% {
        opacity: 0;
        -o-transform: scale(0);
           transform: scale(0);
    }
}
@keyframes ball-spin-clockwise {
    0%,
    100% {
        opacity: 1;
        -webkit-transform: scale(1);
           -moz-transform: scale(1);
             -o-transform: scale(1);
                transform: scale(1);
    }
    20% {
        opacity: 1;
    }
    80% {
        opacity: 0;
        -webkit-transform: scale(0);
           -moz-transform: scale(0);
             -o-transform: scale(0);
                transform: scale(0);
    }
}
    .content {
    background-color: white;
    /* padding: 10px; */
  }
  .overlay {
  position: absolute;
  bottom: 0;
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1;
  width: 95%;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  /* padding: 10px; */
  text-align: center;
}
.content:hover .overlay {
  opacity: 1;
}
.content {
  position: relative;
  /* width: 50%;
  max-width: 300px; */
}

.form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
</style>
@endsection
@section('accueil_client')
<div class="container-fluid ">
    <div class="row justify-center  ">
        <div class="col-12 col-md-6 col-lg-6 mt-20">
            {{-- , ['user' => $user], key($user->id) --}}
@livewire('recherche')

{{-- <div x-data="{ open: false }">
    <button @click="open = !open">Expand</button>

    <span x-show="open">
        Content...
    </span>
</div> --}}
        </div>
    </div>

    {{-- <div class="row"> --}}
        {{-- <div class="col-12">
Mes catégories
        </div> --}}
        {{-- <div class="col-12 col-md-5 mt-2 mx-auto flex">
            <p class="badge  bg-gradient-to-r from-pink-500 to-yellow-500 border-2 rounded-full"><a href="{{url('/')}}"  class="hover:text-text {{(request()->is('/') ? 'text-white':'')}}">Tout</a></p>
            @foreach ($categories as $categorie)
                  <span class=" badge  bg-gradient-to-r from-pink-500 to-yellow-500  border-2 rounded-full"><a href="{{url('/categorie_show/'.$categorie->categorie_name)}}"  class="hover:text-rose-900 {{(request()->is('categorie_show/'.$categorie->categorie_name) ? 'text-white':'')}}">{{$categorie->categorie_name}}</a></span>
            @endforeach --}}

            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"  class="hover:text-rose-900 {{(request()->is('/') ? 'text-rose-900':'')}}">Tout</a></li>
                  @foreach ($categories as $categorie)
                  <li class="breadcrumb-item"><a href="{{url('/categorie_show/'.$categorie->categorie_name)}}"  class="hover:text-rose-900 {{(request()->is('categorie_show/'.$categorie->categorie_name) ? 'text-rose-900':'')}}">{{$categorie->categorie_name}}</a></li>
                  @endforeach

                </ol>
              </nav> --}}


        {{-- </div>
    </div> --}}

    <div class="row">

         <div class="col-12 mt-12 ">


            @livewire('flash')
         </div>
    </div>
    <div class="row mx-24 mt-3">
        <div class="col-12 col-sm-2">
           <div class="text-2xl rounded-md text-center shadow-md text-white  bg-pink-500 border ">Filtrer</div>
           <p class="badge  bg-gradient-to-r from-pink-500 to-yellow-500 border-2 rounded-full"><a href="{{url('/')}}"  class="hover:text-text {{(request()->is('/') ? 'text-white':'')}}">Tout</a></p>
           @foreach ($categories as $categorie)
                 <span class=" badge  bg-gradient-to-r from-pink-500 to-yellow-500  border-2 rounded-full"><a href="{{url('/categorie_show/'.$categorie->categorie_name)}}"  class="hover:text-rose-900 {{(request()->is('categorie_show/'.$categorie->categorie_name) ? 'text-white':'')}}">{{$categorie->categorie_name}}</a></span>
           @endforeach

        </div>
        <div class="col-12 col-sm-10">
            <div class="row  overflow-y-auto "  style="height:500px">

                @foreach ($annonces as $annonce)

                {{-- :annonce="$annonce" --}}
                <livewire:livewire-annonce :annonce="$annonce"/>

                @endforeach
            </div>
        </div>
    </div>

    </div>
</div>

@endsection

@section('accueil_js')
    <script>
        // document.getElementById('myLink').addEventListener('click', function(e) {
        // e.preventDefault(); // Empêche le chargement de la page

        // // Autres actions à effectuer lors du clic sur le lien
        // });

    </script>
@endsection

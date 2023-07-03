@extends('layouts.app_annoceurs')

@section('title')
      recherche | annonce
@endsection

@section('annonce|cherche')
<style>
    /* Make the image fully responsive */
    .carousel-inner img {
      /* width: 100%;
      height: 100%; */
    }
    </style>
@endsection


@section('recherche|annonce')
    <div class="row ">
        <div class="col-12 col-sm-12 col-md-6">
            <div id="demo" class="carousel slide " data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner ">
                    <div class="carousel-item active">
                        <img src="{{asset('backend/images/LOGO MONOGRAMME  - M.png')}}" alt="Chicago" class="rounded-md h-96" width="1100" >
                      </div>
                    @foreach (json_decode($annonce->images) as $imageName)
                    <div class="carousel-item  mx-auto ">
                    <img src="{{asset('storage/annonces_images/'.$imageName)}}" class="shadow-md rounded-md h-96" width="1100"  alt="">
                    </div>
                @endforeach





                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev " href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon rounded-full bg-teal-700"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon rounded-full bg-teal-700"></span>
                </a>
              </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">

           <div class="card ">
            <div class="card-header bg-pink-500 text-white text-center">Informations</div>
            <div class="card-body w-80 mx-auto mb-8">
                <div class="list-group">

                    <a href="#" class="hover:text-rose-900 list-group-item list-group-item-action">Publié par  :  {{$annonce->user->name}}-{{$annonce->created_at}}</a>
                    <a href="#" class="hover:text-rose-900 list-group-item list-group-item-action">Offres : {{$annonce->offres}}</a>
                    <a href="#" class="hover:text-rose-900 list-group-item list-group-item-action">Offres : {{$annonce->offres}}</a>
                    <a href="#" class=" hover:text-rose-900 list-group-item list-group-item-action">Description : {{$annonce->description}}</a>
                    <a href="#" class="hover:text-rose-900 list-group-item list-group-item-action">Tarif : {{$annonce->tarif}} </a>

                  </div>
            </div>

          </div>
        </div>
    </div>
@endsection

@extends('layouts.app_annoceurs')

@section('title')
   Tableau de bord
@endsection

@section('tableau_de_bord_client')
       <div class="row bg-white ">
        <div class="col-12 col-sm-8  h-screen overflow-y-auto ">
            <div class="bg-gradient-to-r from-pink-500 to-yellow-500 flex justify-center items-center  h-24 rounded-md shadow-md ">
                <h1 class="text-center font-bold text-white mx-2">Mes Favoris</h1>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 animate-spin h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                  </svg>
            </div>

            <div class="row">
                      <div class="col-12 text-zinc-700 mt-3">
                        <p class="underline underline-offset-8">
                            Nombre total de mes favoris : <span class=" badge badge-pill bg-violet-500 text-white">{{ Auth::user()->likes->count()}}</span>
                        </p>


                           @if (Session::has('status'))
                           <div class="alert alert-success">
                               {{Session::get('status')}}
                           </div>
                           @endif

                      </div>
            </div>

            <div class="row  ">

              @foreach (Auth::user()->likes as $like)
        <div class="col-6 col-sm-3 mt-3  ">
          <div class="">

            @if ( $like->statut==1)
            <div class="content  pt-0 px-0 mx-auto    rounded-lg shadow-lg">
                <a href="{{url('/images_cibles/'. $like->id)}}" class="nav-link hover:text-teal-600" >
                     <?php $lastImage = ''; ?>
                     @foreach ( json_decode($like->images) as $image)
                         <?php $lastImage = $image; ?>
                         <img src="{{asset("storage/annonces_images/".$image)}}" class="h-48 w-96 object-cover hidden" alt="Lights" style="width:100%">
                     @endforeach
                     <img src="{{asset("storage/annonces_images/".$lastImage)}}" class="h-48 w-96 object-cover hover:scale-125 transition duration-700 ease-in-out" alt="Dernière image" >

                     <div class="text-left">
                         <h3>Offre:{{$like->offres}}</h3>
                         {{-- <p> Description: {{ $like->description}}</p> --}}
                         <p>Lieu :{{ $like->lieu}}</p>
                         <p>Tarif :{{ $like->tarif}}</p>
                         <p>Publié par : {{$like->user->name}}</p>
                     </div>
             </a>
             <div class=" ">
                 <a href="{{url('/commande_annonce/'.$like->id)}}" class="btn shadow-2xl transition duration-300 ease-in-out hover:bg-gradient-to-r from-pink-500 to-yellow-500 bg-violet-500 text-white form-control">Commandez</a>
             </div>

        </div>
         @else

         <div>
            Aucune annonce n'est disponible
         </div>
        @endif
          </div>


        </div>
            @endforeach
            </div>
        </div>

        <div class="col-12 col-sm-4">
           <div class="bg-gradient-to-r from-pink-500 to-yellow-500 flex justify-center items-center h-24 rounded-md shadow-md ">
            <h1 class="text-center font-bold text-white mx-2">Listes de mes commandes</h1>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 animate-spin h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
              </svg>

           </div>

           <div>
            <span>
               {{-- Nombre de commande : {{$commandes->count()}} --}}

            </span>
           </div>

            <div class="row">
                <div class="col-12 bg-gray-100">


                @foreach ($commandes as $commande)

                    @if ($commande->user->id == Auth::user()->id)
                    <div class=" bg-white flex flex-row border-5 border-gray-600 rounded-md  my-1 shadow-md hover:scale-125 transition duration-700 ease-in-out">

                        <?php $lastImage = ''; ?>
                        @foreach (json_decode( $commande->annonce->images) as $image)
                            <?php $lastImage = $image; ?>
                            <img src="{{asset("storage/annonces_images/".$image)}}" class="h-48 w-96 object-cover hidden" alt="Lights" style="width:100%">
                        @endforeach
                        <img src="{{asset("storage/annonces_images/".$lastImage)}}" class=" h-40 w-40 img-fluid  hover:scale-125 transition duration-700 ease-in-out " alt="Dernière image" >


                        <div class="flex flex-col">
                            <span>offres : {{$commande->annonce->offres}}</span>
                            <span>Date : {{$commande->annonce->created_at}}</span>
                            <span>Crée par : {{$commande->annonce->user->name}}</span>
                        </div>
                    </div>
                    @endif

                 @endforeach


                </div>
            </div>

        </div>
        {{-- <div class="col-12 col-sm-4">

qsvqsv
        </div> --}}
       </div>
@endsection

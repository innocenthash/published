@extends('layouts.app_annoceurs')

@section('title')
       mes annonces
@endsection

@section('affiche_annonces_client')


<div class="row bg-white mx-1 ">
<div class="col-12 col-sm-8 pb-64 h-screen   border-sky-500 overflow-y-auto">

    <div class="bg-gradient-to-r from-pink-500 to-yellow-500 flex justify-center items-center h-24 rounded-md shadow-md mb-2">
        <h1 class="text-center font-bold text-white mx-2">Mes Catalogues</h1>
        {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 text-white animate-bounce transition duration-300 ease-in-out  h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
          </svg> --}}

    </div>
            @foreach ($annonces as $annonce)
    <div class=" bg-gray-100 p-2 h-40 mb-3 flex justify-between overflow-x-auto overflow-y-hidden">

            {{-- <li>{{$annonce->images}}</li> --}}
            @foreach (json_decode($annonce->images) as $imageName)
                <img src="{{asset('storage/annonces_images/'.$imageName)}}" class=" object-cover mb-1 hover:scale-125 transition duration-700 ease-in-out mx-1" alt="">

            @endforeach




    </div>

    <ul class="border-b-4 border-slate-500 mb-2">
        <li>
            <li>Offre(s) :{{$annonce->offres}}</li>
            <li>Lieu :{{$annonce->lieu}}</li>
            <li>Description :{{$annonce->description}}</li>
            <li>Tarif: {{$annonce->tarif}} €</li>
            @if ($annonce->statut==1)
            <li class="mb-3">Statut: <div class="badge badge-pill text-white  bg-gradient-to-r from-pink-500 to-yellow-500 shadow-2xl shadow-pink-500"><span class="animate-ping-slow">Active</span></div>
                {{-- <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 b bg-red-100"></span>
                  </span> --}}
            </li>
            @else
            <li class="mb-3">Statut: <div class="badge badge-pill  bg-gradient-to-r from-pink-500 to-yellow-500 shadow-2xl shadow-pink-500"><span class="animate-ping-slow">Desactive</span></div>
                {{-- <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 b bg-red-100"></span>
                  </span> --}}
            </li>
            @endif

            <li class="mb-2 flex">

                @if ($annonce->statut==1)
                <button disabled class="btn mt-1 shadow-2xl w-52 bg-gradient-to-r from-pink-500 to-yellow-500 text-white" href="{{url('/payement_annonce/'.$annonce->id)}}">Déjà Payé</button>
                @else
                <a class="btn bg-pink-500 text-white" href="{{url('/editer_annonce/'.$annonce->id)}}"><i class="fas fa-edit"></i></a>
                <a class=" flex btn  bg-yellow-500 text-white shadow-md  border transition duration-700 ease-in-out border-slate-300 hover:border-slate-400 hover:bg-rose-800" href="{{url('/payement_annonce/'.$annonce->id)}}">Payement <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 mx-1 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                  </svg>
                  </a>
                @endif
            </li>
            <li class="mb-2">

             @if ($annonce->statut==1)
             <a class="btn hover:ring-0 w-64 bg-gradient-to-r from-pink-500 to-yellow-500 text-white shadow-md  border transition duration-700 ease-in-out border-slate-300 hover:border-slate-400 hover:bg-rose-800" href="{{url('/recup_date/'.$annonce->id)}}">Date de fin d'abonnement <i class="fas fa-calendar"></i></a>
             @else
             <button type="button" data-toggle="tooltip" data-placement="left" title="votre annonce n'est pas encore disponible" class="focus:ring-0 btn w-64 bg-gradient-to-r from-pink-500 to-yellow-500 text-white shadow-md  border transition duration-700 ease-in-out border-slate-300 hover:border-slate-400 hover:bg-rose-800" >Date de fin d'abonnement <i class="fas fa-calendar"></i></button>
             @endif




            </li>
        </li>
     </ul>


        @endforeach

</div>

     <div class="col-12 col-sm-4">
           <div>

            <div class="bg-gradient-to-r from-pink-500 to-yellow-500 flex justify-center items-center h-24 rounded-md shadow-md">
                <h1 class="text-center font-bold text-white mx-2">Commandes</h1>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 text-white animate-bounce transition duration-300 ease-in-out   h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                  </svg> --}}

            </div>


        {{-- @foreach (Auth::user()->commandes as $annonce)
       <span>{{$annonce->id}}</span>
        @endforeach --}}
           </div>



        @foreach (Auth::user()->annonces as $annonce)
            @foreach ($annonce->commandes as $commande)
            <div class=" bg-white flex flex-row   my-1 shadow-md ">

                <?php $lastImage = ''; ?>
                @foreach ( json_decode($commande->annonce->images) as $image)
                    <?php $lastImage = $image; ?>
                    <img src="{{asset("storage/annonces_images/".$image)}}" class="h-48 w-96 object-cover hidden" alt="Lights" style="width:100%">
                @endforeach
                <img src="{{asset("storage/annonces_images/".$lastImage)}}" class=" h-40 w-40 img-fluid  hover:scale-125 transition duration-700 ease-in-out " alt="Dernière image" >

                <div class="flex mx-2 flex-col w-96 relative">
                    <p class="text-left">Offres :{{$commande->annonce->offres}}</p>


                  <p>Client :{{$commande->user->name}}</p>
                  <p>Question :{{$commande->question->question}}</p>

                  <p>Date : {{$commande->created_at}}</p>

                   @if($commande->validation==0)
                    <button class="btn bg-violet-500 text-white hover:scale-100 transition duration-700 ease-in-out"  onclick="window.location='{{url('/valider_commande/'.$commande->id)}}'">Valider la commande</button>

                   @elseif ($commande->validation)
                    <button  disabled class=" btn bg-violet-500 text-white hover:scale-0 transition duration-700 ease-in-out"  onclick="window.location='{{url('/valider_commande/'.$commande->id)}}'">Déjà validé</button>
                   @endif

              </div>
            </div>


            @endforeach
        @endforeach

     </div>

   </div>





@endsection

@section('affiche_annonce_client_js')
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection

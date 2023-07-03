<div class="col-12 col-sm-6 col-md-4 col-lg-2 mt-1 ">

    @if ($annonce->statut==1)
    <div class="content h-64 pt-1 px-2 mx-auto relative rounded-lg shadow-md ">
        <a href="{{url('/images_cibles/'.$annonce->id)}}">
                 <?php $lastImage = ''; ?>
                 @foreach ($annonce->images as $image)
                     <?php $lastImage = $image; ?>
                     <img src="{{asset("storage/annonces_images/".$image)}}" class="h-48 w-96 object-cover hidden" alt="Lights" style="width:100%">
                 @endforeach
                 <img src="{{asset("storage/annonces_images/".$lastImage)}}" class="h-48 w-96 object-cover hover:scale-25 transition duration-700 ease-in-out" alt="Dernière image" >

                 <div class="transition delay-300 duration-700 ease-in-out overlay  ">
                      <button class="btn rounded-full mt-1 bg-sky-500">voir les annonces</button>
                     <h3>{{$annonce->offres}}</h3>
                     <p>{{$annonce->description}}</p>
                     <p>{{$annonce->lieu}}</p>
                     <p>{{$annonce->tarif}}</p>
                 </div>
         </a>
                <button class=" text-gray-600  h-5 w-5 focus:outline-none" wire:click="addfav">
                    <svg class="absolute top-0 right-0 w-6 hover:scale-125 transition duration-700 ease-in-out" xmlns="http://www.w3.org/2000/svg" fill="{{ $annonce->isLiked() ? "red" :"white"}}" viewBox="0 0 24 24" strokeWidth={1.5}  stroke="gray" className="w-2 h-2">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </button>
    </div>
     @else

     <div>
        Aucune annonce n'est disponible
     </div>
    @endif

</div>

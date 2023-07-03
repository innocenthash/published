<div wire:init="loadPosts">


        <div wire:loading>
          <div style="display:flex;justify-content:center;align-items:center;background-color:black ; position:fixed ;top:0px ; left:0px;z-index:9999;width:100%;height:100%;opacity:.75">

            <div class="la-ball-spin-clockwise la-dark la-3x">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
          </div>
       </div>
    <div class="table-wrap mt-9">
        <table class="table ">
          <thead class="thead-primary bg-gradient-to-r from-pink-500 to-yellow-500 text-white">
            <tr>
                <th>&nbsp;</th>

                <th>Offres</th>
                <th>&nbsp;</th>
              <th>Tarif</th>

              <th>Lieu</th>
              <th>Description</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            {{-- livewire-affiche-annonce-admin --}}
            {{-- @foreach ($annonces as $annonce) --}}
            @if($isLoading==false)
            @foreach ($annonces as $annonce)
            <tr role="alert">
             <td>
                 <label class="checkbox-wrap checkbox-primary">
                       <input type="checkbox" >
                       <span class="checkmark"></span>
                     </label>
             </td>
             <td>
                 <div class=" bg-gray-100 p-2 h-24 mb-3 flex justify-between overflow-x-auto overflow-y-hidden">
                     {{-- <li>{{$annonce->images}}</li> --}}
                     @foreach (json_decode($annonce->images) as $imageName)
                         <img src="{{asset('storage/annonces_images/'.$imageName)}}" class=" object-cover mb-1 hover:scale-125 transition duration-700 ease-in-out mx-1" alt="">
                     @endforeach
             </div>
             </td>
           <td>
               <div class="email">
                   <span>{{$annonce->offres}}</span> <br>
                   <span>Publié par : {{$annonce->user->name}}</span>
               </div>
           </td>
           <td>{{$annonce->tarif}} €</td>
           <td>
           <span>{{$annonce->lieu}}</span>
          </td>
         <td>{{$annonce->description}}</td>
           <td class="flex ">

               @if ($annonce->statut==0)
               <a href="{{url('/activer_annonces/'.$annonce->id)}}" class="mx-2 hover:scale-100 btn text-white bg-lime-400 focus:ring-0 hover:bg-teal-700 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                  </svg>

               </a>
               @else
               <a href="{{url('/desactiver_annonces/'.$annonce->id)}}" class="mx-2 btn text-white bg-yellow-400 focus:ring-0 hover:bg-rose-800 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>

               </a>
               @endif

               <a href="{{url('/supprimer_annonces_admin/'.$annonce->id)}}" class="hover:text-red-800 hover:scale-100 btn" type="button" >
                 <span><i class="fa fa-close"></i></span>
               </a>

         </td>
         </tr>
            @endforeach
            @endif
            {{-- @endforeach --}}

          </tbody>
        </table>
    </div>

</div>

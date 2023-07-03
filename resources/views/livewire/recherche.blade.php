<div  x-data="{ open: true }" class="" >
    <div class="card card-sm ring-slate-200 rounded-full shadow-md ">
        <div class="card-body ring-slate-200 row no-gutters align-items-center">
            <div class="col-auto">
                <i class="fas fa-search h4 text-body"></i>
            </div>
            <!--end of col-->
            <div class="col">

                <input type="search" @click.away='open = false'  @click='open=true'
                 wire:keydown.arrow-down.prevent='incrementIndex'
                 wire:keydown.arrow-up.prevent='decrementIndex'
                 wire:keydown.backspace="resetIndex"
                 wire:keydown.enter.prevent='voir_annonce'

                class="form-control focus:ring-white focus: rounded-full form-control-lg form-control-borderless" placeholder="Rechercher une annonce..." wire:model='query'>
            </div>
            <!--end of col-->
            {{-- <div class="col-auto">
                <button class="btn btn-md bg-teal-600 text-white" type="submit">Search</button>
                {{-- <div id="loadingIndicator" style="{{ $isLoading ? 'display: block;' : 'display: none;' }}">Loading...</div> --}}
            {{-- </div> --}}
            <!--end of col-->
        </div>
    </div>

    <div>
        <div x-show="open">
               @if(strlen($query)>2)
                 <div class="bg-gray-100" >
                         @if(count($annonces)>0)
                                @foreach ($annonces as $index=>$annonce)
                                   <p class='{{ $index===$selectedIndex ? 'text-sky-500':''}}'>{{$annonce->offres}}</p>
                                @endforeach
                         @else

                          <span>0 resultats pour {{$query}}</span>
                         @endif
                 </div>

               @endif
        </div>
    </div>
</div>

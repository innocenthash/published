<div>


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



        {{-- <button >Charger</button> --}}
        <div class="bg-gradient-to-r from-pink-500 to-yellow-500 card-header font-extrabold text-2xl text-white text-center">Categorie</div>
        <div class="card-body">

            @if (Session::has('status'))
            <div class="alert bg-teal-700 text-white">
                       {{Session::get('status')}}
            </div>
            @endif

            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                      {{$error}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table class="table table-white table-hover">
                <thead class=" ">
                  <tr>
                    <th>Nom</th>
                    <th></th>
                    <th></th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>

                    @if($isLoading==false)

                    {{-- @if ($categories !== "") --}}
                    @foreach ($categories as $categorie)
                    <tr>
                        <td>{{$categorie->categorie_name}}</td>
                        <td></td>
                        <td></td>
                        <td><button onclick="window.location='{{url('/edit_categorie/'.$categorie->id)}}'" class="btn bg-teal-500 focus:ring-0 mx-2 text-white"  >Editer</button><a href="{{url('/supprimer_categorie/'.$categorie->id)}}" id='supprimer' class="btn focus:ring-0 text-white bg-pink-500 hover:bg-rose-900">Supprimer</a></td>
                      </tr>

                    @endforeach
                    {{-- @endif --}}

                   @endif

                </tbody>
              </table>
        </div>

      </div>



</div>

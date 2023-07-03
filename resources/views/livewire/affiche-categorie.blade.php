<div>
    
    <div class="card-header font-extrabold text-2xl text-teal-700 text-center">Categorie</div>
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
            <thead>
              <tr>
                <th>Nom</th>
                <th></th>
                <th></th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categorie)
                <tr>
                    <td>{{$categorie->categorie_name}}</td>
                    <td></td>
                    <td></td>
                    <td><button onclick="window.location='{{url('/edit_categorie/'.$categorie->id)}}'" class="btn bg-black mx-2 text-white"  >Editer</button><a href="{{url('/supprimer_categorie/'.$categorie->id)}}" id='supprimer' class="btn text-white bg-rose-900">Supprimer</a></td>
                  </tr>

                @endforeach

            </tbody>
          </table>
    </div>

  </div>

</div>

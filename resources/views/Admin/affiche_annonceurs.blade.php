@extends("layouts.dashboard_admin")
@section('title')
        Les annonceurs
@endsection

@section('affiche_annonceurs')

<div class="row">

    <div class="col-12 col-sm-12 flex justify-between mt-6">
         <button  class="btn hover:bg-yellow-500 hover:shadow-yellow-500 bg-fuchsia-700 shadow-xl shadow-fuchsia-700 hover:scale-105 mb-2 focus:ring-0  transition duration-300  ease-in-out text-white flex" data-toggle="modal" data-target="#myModal"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
          </svg>
          </button>
        <div class="flex ">
            <a href="{{url('/affiche_annonceur/annonceur')}}" class=" hover:bg-yellow-500 hover:shadow-yellow-500 mx-2 mb-2 flex btn bg-fuchsia-700 focus:ring-0 text-white shadow-xl shadow-fuchsia-700 hover:scale-105">Annonceur<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18" />
              </svg>
              </a>
            <a href="{{url('/affiche_client/client')}}" class=" hover:bg-yellow-500 hover:shadow-yellow-500 mb-2 flex btn shadow-xl bg-fuchsia-700 focus:ring-0 shadow-fuchsia-700 hover:scale-105 text-white">Client<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3" />
              </svg>
              </a>
        </div>
    </div>
    <!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">


            <div class="card w-100  mx-auto ">
                <div class="card-body">

                    <div class="form-group flex items-center justify-center">
                        <img src="{{asset('backend/images/LOGO MONOGRAMME  - M.png')}}" alt="Logo" width="80">
                    </div>
                    <div class="text-2xl font-extrabold">
                        <p class="bg-clip-text text-center text-transparent bg-gradient-to-r from-pink-500 to-yellow-500">
                       Ajouter un nouveau administrateur
                        </p>
                      </div>

                      <form method="POST" action="{{url('/register_admin')}}">
                        @csrf
                        <div class="form-group">
                            <label for="nom">Nom :</label>
                            <input type="text" class="form-control rounded-lg" name="name" id="nom" placeholder="Entrez votre nom" required autofocus autocomplete="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse e-mail :</label>
                            <input type="email" class="form-control rounded-lg" name="email" id="email" required autocomplete="username" placeholder="Entrez votre adresse e-mail">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" class="form-control rounded-lg"
                            name="password"
                            required  id="password" placeholder="Entrez votre mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirme :</label>
                            <input type="password" class="form-control rounded-lg"

                            name="password_confirmation" required  id="password_confirmation" placeholder="Entrez votre mot de passe">
                        </div>

                        <button type="submit" class="hover:ring-0 hover:transition duration-700 ease-in-out btn bg-gradient-to-r from-pink-500 to-yellow-500 text-white btn-block rounded-lg">S'inscrire</button>



                      </form>
                    </form>
                </div>
            </div>


        </div>



      </div>
    </div>
  </div>

    <div class="col-12 col-sm-12 ">
        @if (count($errors)>0)
        <div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
           @foreach ($errors->all() as $error)
           <li class="text-white">
               {{$error}}
           </li>
           @endforeach
        </ul>
         </div>
        @endif
        <div class="card shadow-md  h-75  overflow-y-auto  ">
            <p class="card-header text-center  font-extrabold text-2xl bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-yellow-500">Listes de tous les membres</p>
            <div class="card-body table-responsive">

              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Rôle</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($annonceurs as $annonceur)
                      <tr>
                          <td>{{$annonceur->name}}</td>
                          <td>{{$annonceur->email}}</td>
                          <td>{{$annonceur->genre}}</td>
                          <td><a href="{{url('/supprimer_user/'.$annonceur->id)}}" class="btn bg-pink-500  hover:bg-pink-700 hover:shadow-md hover:shadow-pink-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 text-white h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                          </svg>
                          </a></td>
                        </tr>
                      @endforeach

                  </tbody>
                </table>

            </div>
            <div class="card-footer">Footer</div>
          </div>
    </div>
</div>
@endsection

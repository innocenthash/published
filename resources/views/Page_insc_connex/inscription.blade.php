
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/bootstrap/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/bootstrap/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: #f0f2f5">
    <div class="container-fluid mt-5 ">
        <div class="row ">
            <div class="col-12 col-md-6 mt-24 flex justify-center">
               <div>
                <h1 class="text-7xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-yellow-500 ">Published</h1>
                <p class="text-xl">Achetez , publiez chez nous vos articles</p>
               </div>
            </div>
            <div class="col-12 col-md-6 mt-3 ">
                <div class="card w-80  rounded-lg shadow-sm  ">
                    <div class="card-body">

                        <div class="form-group flex items-center justify-center">
                            <img src="{{asset('backend/images/LOGO MONOGRAMME  - M.png')}}" alt="Logo" width="80">
                        </div>
                        <div class="text-2xl font-extrabold">
                            <p class="bg-clip-text text-center text-transparent bg-gradient-to-r from-pink-500 to-yellow-500">
                              Inscription
                            </p>
                          </div>
                          @if (count($errors)>0)
                        <div class="alert alert-danger alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <ul>
                           @foreach ($errors->all() as $error)
                           <li>
                               {{$error}}
                           </li>
                           @endforeach
                        </ul>
                         </div>
                        @endif
                          <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" class="focus:ring-0 form-control rounded-lg" name="name" id="nom" placeholder="Entrez votre nom" required autofocus autocomplete="name">
                            </div>

                            <div class="form-group">
                                <label for="email">Adresse e-mail :</label>
                                <input type="email" class="form-control focus:ring-0 rounded-lg" name="email" id="email" required autocomplete="username" placeholder="Entrez votre adresse e-mail">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe :</label>
                                <input type="password" class="form-control focus:ring-0 rounded-lg"
                                name="password"
                                required  id="password" placeholder="Entrez votre mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirme :</label>
                                <input type="password" class="form-control focus:ring-0 rounded-lg"

                                name="password_confirmation" required  id="password_confirmation" placeholder="Entrez votre mot de passe">
                            </div>
                            <div class="flex justify-between mb-1">
                                <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input " name="genre" value="client">Client
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="genre" value="annonceur">Annonceur
                                    </label>
                                  </div>
                            </div>
                            <button type="submit" class="focus:ring-0 hover:bg-teal-700 hover:transition duration-700 ease-in-out btn bg-gradient-to-r from-pink-500 to-yellow-500 text-white btn-block rounded-lg">S'inscrire</button>


                            <p class=" mt-1" style="font-size:15px">Vous avez déjà un compte ? <a href="{{url('/connexion')}}" style="color: #1b7e94" >Log in</a></p>
                          </form>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{asset('backend/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
</body>
</html>



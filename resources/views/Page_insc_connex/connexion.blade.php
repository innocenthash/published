<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter</title>
    <link rel="stylesheet" href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/bootstrap/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/bootstrap/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: #f0f2f5">
    <div class="container mt-5">
        <div class="row ">
            <div class="col-12 col-md-6 flex justify-center mt-24 ">
              <div>
              <h1 class="text-7xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-yellow-500  ">Published</h1>
              <p class="text-xl">Achetez , publiez chez nous vos articles</p>
              </div>
            </div>
            <div class="col-12 col-md-6 mt-5 ">
                <div class="card w-1/2  rounded-lg shadow-sm ">
                    <div class="card-body">

                        <div class="form-group flex items-center justify-center">
                            <img src="{{asset('backend/images/LOGO MONOGRAMME  - M.png')}}" alt="Logo" width="80">
                        </div>
                        <div class="text-2xl font-extrabold mb-3">
                            <p class=" text-center  bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-yellow-500 ">
                              Connexion
                            </p>
                          </div>
                          <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Adresse e-mail :</label>
                                <input type="email" class="focus:ring-0 form-control rounded-lg" name="email" id="email" placeholder="Entrez votre adresse e-mail">
                            </div>
                            <div class="form-group">
                                <label for="mdp">Mot de passe :</label>
                                <input type="password" class="focus:ring-0 form-control rounded-lg" name="password" id="mdp" placeholder="Entrez votre mot de passe">
                            </div>

                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <button type="submit" class="hover:bg-teal-700 hover:transition duration-700 ease-in-out btn focus:ring-0 bg-gradient-to-r from-pink-500 to-yellow-500  text-white btn-block rounded-lg">Se connecter</button>

                            <div class="form-group mt-2 mx-auto text-center">
                                <p class="mb-2 mt-2 text-muted" style="font-size:15px" >Mot de passe oublié ?  <a href="{{ url('/pass_oublie') }}" style="color: #1b7e94" class="f-w-400">Reset</a></p>
                                <p class="mb-0 text-muted" style="font-size:15px">Pas de compte ? <a href="{{url('/')}}" style="color: #1b7e94" class="f-w-400">Sign up</a></p>
                            </div>



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

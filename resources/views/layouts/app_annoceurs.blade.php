<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/vendor/bootstrap/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/vendor/bootstrap/css/all.css')}}">
        <link rel="stylesheet" href="{{asset('backend/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
        {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
         @yield('accueil_css')
         @yield('affiche_annonce_css')
         @yield('payement_css')
         @yield('plans_css')
         @yield('conversation_css')
         @yield('annonce|cherche')
         <style>
            [x-cloak]{
                display: none ;
            }
         </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    </head>
    <body class=" font-sans antialiased  " style="background-color:#f0f2f5">

         <header>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>

              <!-- Navbar links -->

                <nav class="navbar  navbar-expand-sm p-3 fixed-top drop-shadow-md text-white bg-gradient-to-r from-pink-500 to-yellow-500 mx-0 text-center mb-16">
                    <a class="navbar-brand" href="#">
                     <img src="{{asset('backend/images/LOGO MONOGRAMME  - M.png')}}" class="bg-white rounded-full " alt="Logo" style="width:40px; height:40px">
                   </a>

                   @auth
                       @if (Auth::user()->genre=='annonceur')
                       <ul class="ml-auto flex">
                        <li>
                            <a class="nav-link transition delay-150 duration-600 ease-in-out hover:border-white  hover:border-b-2   text-white mx-2"href="{{url('Accueil_client')}}">Catalogues</a>
                        </li>
                        <li>
                            <a  class="nav-link  transition delay-150 duration-600 ease-in-out hover:border-white  hover:border-b-2   text-white  mx-2"  href="{{url('/conversation')}}">Conversations</a>
                        </li>
                        <li>
                            <a class="nav-link mx-2 transition delay-150 duration-600 ease-in-out hover:border-white  hover:border-b-2   text-white " href="{{url('/Ajouter_Annonces')}}" class="">Nouveau</a>
                        </li>
                        <li class="dropdown">
                            {{-- <div > --}}
                                <div type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                                  Mon Compte
                                </div>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item nav-link hover:text-teal-600" href="{{route('profile.edit')}}"><i class="text-teal-700 fas fa-user"></i> Mon Profil</a>

                                <a class="dropdown-item nav-link hover:text-teal-600" href="{{route('qrcode_formulaire.qrcode_formulaire')}}"><i class="fas fa-qrcode text-teal-700"></i> QrCode Generate</a>
                                <a href="{{url('/affiche_annonces_client/'.Auth::user()->id)}}" class="nav-link  hover:text-teal-600 dropdown-item"><i class="fas fa-dashboard text-teal-700"></i> Tableau de bord</a>
                                <a class="dropdown-item nav-link hover:text-teal-600" href="{{url('/boutique')}}"><i class="fas fa-home text-teal-700"></i> Ma Boutique</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')"  class="nav-link hover:text-teal-600 dropdown-item"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="fas fa-power-off text-teal-700"></i> Déconnexion</a>

                            </form>

                                  {{-- <a class="dropdown-item" href="#">Link 3</a> --}}
                                </div>
                              {{-- </div> --}}

                        </li>
                       </ul>
                       @elseif (Auth::user()->statut==1)

                       <ul class="ml-auto flex">

                        <li class="dropdown">

                                <div type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                                  Mon Compte
                                </div>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item nav-link hover:text-teal-600" href="{{route('profile.edit')}}"><i class="fas fa-user"></i> Mon Profil</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                    <a href="route('logout')"  class="nav-link hover:text-teal-600 dropdown-item"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="fas fa-power-off"></i> Déconnexion</a>
                                </form>



                                </div>


                        </li>
                       </ul>

                       @else
                       <ul class="ml-auto flex">
                        <li>
                            <a class="nav-link  transition delay-150 duration-600 ease-in-out hover:border-white  hover:border-b-2   text-white  mx-2" href="{{url('/Accueil_client')}}" >Catalogues</a>
                        </li>
                        <li>
                            <a class="nav-link mx-2  transition delay-150 duration-600 ease-in-out hover:border-white  hover:border-b-2   text-white " href="{{url('/conversation')}}" class="">Conversations</a>
                        </li>
                        <li class="dropdown">
                            {{-- <div > --}}
                                <div type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                                  Mon Compte
                                </div>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item nav-link hover:text-teal-600" href="{{route('profile.edit')}}"><i class="fas fa-user"></i> Mon Profil</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                    <a href="route('logout')"  class="nav-link hover:text-teal-600 dropdown-item"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="fas fa-power-off"></i> Déconnexion</a>
                                         </form>


                                         <a href="{{url('/tableau_de_bord_client')}}" class="nav-link  hover:text-teal-600 dropdown-item"><i class="fas fa-dashboard"></i>Tableau de bord</a>


                                  {{-- <a class="dropdown-item" href="#">Link 3</a> --}}
                                </div>
                              {{-- </div> --}}

                        </li>
                       </ul>
                       @endif
                   @endauth

                   @guest
                   <ul class="ml-auto flex">
                    {{-- <li>
                        <a class="nav-link  transition delay-150 duration-600 ease-in-out hover:border-white  hover:border-b-2   text-white  mx-2" href="{{url('/affiche_annonces_client')}}" class="">Annonces</a>
                    </li>
                    <li>
                        <a class="nav-link mx-2  transition delay-150 duration-600 ease-in-out hover:border-white  hover:border-b-2   text-white " href="" class="">lorem</a>
                    </li> --}}
                    <li class="dropdown">
                        {{-- <div > --}}
                            <div type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                                Espace Client
                            </div>
                            <div class="dropdown-menu">
                                <a class="dropdown-item nav-link hover:text-teal-600" href="{{url('/connexion')}}">Connexion</a>


                                <a href="{{url('/inscription')}}"  class="nav-link hover:text-teal-600 dropdown-item">Inscription</a>
                            </form>

                              {{-- <a class="dropdown-item" href="#">Link 3</a> --}}
                            </div>
                          {{-- </div> --}}

                    </li>
                   </ul>
                   @endguest



                 </nav>

             </div>
         </header>

              @yield('accueil_client')
              @yield('inscription')

            <!-- Page Content -->
            <main class="container-fluid overflow-x-hidden mt-12 mx-1 ">

                {{-- annonceurs debut --}}
                @yield('ajouter_annonces')
                @yield('affiche_annonces_client')
                @yield('conversation')
                @yield('message')
                @yield('Edite|Annonce')


                {{-- payement debut --}}

                @yield('payement')

                @yield('plans')

                @yield('subscription')

                @yield('sub_success')

                {{-- payement fin --}}

                {{-- fin annonceurs --}}

                {{-- client debut --}}

                @yield('tableau_de_bord_client')

                @yield('question')

                {{-- client fin --}}

                {{-- recherche | annonce debut --}}
                @yield('recherche|annonce')

                {{-- recherche | annonce fin --}}

                {{-- date de fin d'essaie debut  --}}
                   @yield('Date|fin')

                {{-- date de fin d'essaie fin --}}

                {{-- qrcode debut--}}
                  @yield('QrCode|Generate')
                  @yield('qrcode_form')
                {{-- qrcode fin--}}
            </main>


        {{-- !-- jquery 3.3.1 --> --}}
    <script src="{{asset('backend/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/turn.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/turn.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/all.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/all.min.js')}}"></script>
    <script>
        $("#book").turn({
          width: 800,
          height: 600,
          autoCenter: true
        });
      </script>
    @yield('ajouter_annonce_js')
    @yield('affiche_annonce_js')
    @yield('accueil_js')
    @yield('affiche_annonce_client_js')
    @livewireScripts
    <script>
        setInterval(function() {
            var joursElement = document.getElementById('jours');
            var heuresElement = document.getElementById('heures');
            var minutesElement = document.getElementById('minutes');
            var secondesElement = document.getElementById('secondes');

            var jours = parseInt(joursElement.textContent);
            var heures = parseInt(heuresElement.textContent);
            var minutes = parseInt(minutesElement.textContent);
            var secondes = parseInt(secondesElement.textContent);

            // Décrémenter les secondes
            secondes--;

            if (secondes < 0) {
                minutes--;
                secondes = 59;

                if (minutes < 0) {
                    heures--;
                    minutes = 59;

                    if (heures < 0) {
                        jours--;
                        heures = 23;

                        if (jours < 0) {
                            alert('terminer !')
                        }
                    }
                }
            }

            // Mettre à jour les éléments HTML avec les nouvelles valeurs
            joursElement.textContent = jours;
            heuresElement.textContent = heures.toString().padStart(2, '0');
            minutesElement.textContent = minutes.toString().padStart(2, '0');
            secondesElement.textContent = secondes.toString().padStart(2, '0');
        }, 1000); // Mettre à jour toutes les 1 seconde (1000 millisecondes)
    </script>

    <script>
        Livewire.on('messageReceived', () => {
            // Faites défiler jusqu'en bas du conteneur de discussion pour afficher le dernier message
            const chatContainer = document.querySelector('#chat-container');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        });
    </script>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

       <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CK1X4NCHKH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CK1X4NCHKH');
</script>
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
        <link rel="stylesheet" href="{{asset('backend/vendor/bootstrap/css/front.css')}}">

        <script src="{{asset('backend/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
        @yield('aff_ann_css')
        <!-- Scripts -->

         @livewireStyles
@yield('affiche|categorie_css')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background-color:#f0f2f5">



        <div class="wrapper ">
            <!-- Sidebar -->
            <nav id="sidebar" class="bg-white">
                <div class="sidebar-header flex justify-center animate-spin bg-white ">
                    {{-- <a class="navbar-brand d-flex align-items-center" href="#"> --}}
                        <img src="{{asset('backend/images/LOGO MONOGRAMME  - M.png')}}" class="object-cover object-center  h-16 img-fluid" alt="Logo">
                    {{-- <span class="h2" style="color: rgb(147, 41, 81)">Ru<span style="font-weight: bold">ngo</span></span> --}}
                    {{-- </a> --}}
                </div>

                <div class="list-group list-group-flush">
                    <a href="{{url('/annonceurs')}}" class="hover:text-pink-500 list-group-item flex list-group-item-action text-teal-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                      </svg>
                       Les Membres</a>
                    <a href="{{url('/annonces_tous_annonceurs')}}" class="hover:text-pink-500 list-group-item list-group-item-action  text-teal-800"><i class="fas fa-shopping-cart"></i> Les Catalogues</a>


                    <div class="dropdown dropright">

                        {{-- <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                          Dropdown button
                        </button> --}}
                        <div class="dropdown-menu">
                            <a class="dropdown-item hover:text-pink-500 text-teal-800 " href="{{url('/create_plan')}}">Nouveau</a>
                            <a class="dropdown-item hover:text-pink-500 text-teal-800 " href="#">Listes</a>

                          </div>
                    </div>
                    <div class="dropdown dropright">

                        <a href="#" class="flex hover:text-pink-500 list-group-item list-group-item-action  text-teal-700  dropdown-toggle" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="  w-6 font-extrabold h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                          </svg>
                           Categorie</a>
                       {{-- <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                         Dropdown button
                       </button> --}}
                       <div class="dropdown-menu">
                           <a class="dropdown-item hover:text-pink-500 text-teal-800 " href="{{url('/create_categorie')}}">Nouvelle</a>
                           {{-- wire:click="loadPosts" --}}
                           {{-- <a  class="dropdown-item  text-teal-800" id="mon-lien" href="{{url('/live-caregorie')}}">Listes</a> --}}

                           <a class="dropdown-item hover:text-pink-500 text-teal-800 "  href="{{url('/affiche_categorie')}}">Listes</a>

                         </div>
                   </div>

                   <div class="dropdown dropright">

                    <a href="#" data-toggle="dropdown" class="dropdown-toggle flex hover:text-pink-500 list-group-item list-group-item-action  text-teal-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                      </svg>
                       Graphique</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item flex hover:text-pink-500 text-teal-800 " href="{{url('/affiche_graphique_users')}}">Utilisateurs <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                          </svg>
                          </a>
                        {{-- wire:click="loadPosts" --}}
                        {{-- <a  class="dropdown-item  text-teal-800" id="mon-lien" href="{{url('/live-caregorie')}}">Listes</a> --}}

                        <a class="dropdown-item hover:text-pink-500 text-teal-800 "  href="{{url('/affiche_graphique_annonce')}}">Listes</a>
                    </div>

                   </div>



                </div>





            </nav>







            <div id="content " class=" w-100">


                <nav class="navbar navbar-expand-lg border-bottom navbar-white text-white  bg-gradient-to-r from-pink-500 to-yellow-500 ">
                    <div class="container-fluid d-flex flex-row">

                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-reorder"></i>
                        <span></span>
                    </button>



                    <!-- Links -->



                    <ul class="ml-auto flex">

                        <li class="dropdown">

                                <div type="button" class="btn bg  dropdown-toggle " data-toggle="dropdown">
                                  <span class="mr-4">Mon Compte</span>
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


                    </div>
                </nav>



                <main class="container  bg-gray-100">
                     @yield('Representation|Graphique')


                      @yield('affiche_annonceurs')
                      @yield('annonces_tous_annonceurs')
                      @yield('formulaire_plan')
                      @yield('categorie|formulaire')
                      @yield('affiche|categorie')
                      @yield('Edit|categorie')
                      @yield('content')

                 </main>
        </div>


    </div>








   <footer class=" h-100 p-5 text-center footer border-top">
        Copyright C.
        Rungo.biz
         Affiliation. Tout droits Réservés.



    </footer>



        {{-- !-- jquery 3.3.1 --> --}}

    <!-- bootstap bundle js -->
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/turn.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/turn.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/all.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/all.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/front.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('backend/vendor/jquery/jquery-3.3.1.min.js')}}"></script>

    @yield('formulaire_plan_js')
    @yield('affiche|categorie_js')


    @livewireScripts
    @yield('Graphique_js')

    </body>
</html>

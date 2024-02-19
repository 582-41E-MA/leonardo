<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
   
    <header class="bg-dark py-5">

    <nav>
    
    <!-- Navigation-->

        <ul role="menubar">


                <li role="menuitem" aria-label="Menu index" aria-haspopup="false">
                <img src="{{ asset('./assets/logo.svg') }}" alt="Logo" width="50" height="50">

                </li>

                <!-- Liens de page -->
                <li role="menuitem" aria-label="Menu Accueil" aria-haspopup="false"><a href="/">Accueil</a></li>
                <li role="menuitem" aria-label="Menu Produits" aria-haspopup="false"><a
                href="#">Produits</a></li>
                <li role="menuitem" aria-label="Menu A propos" aria-haspopup="false"><a href="#">A propos</a> </li>
                <li role="menuitem" aria-label="Menu Contact" aria-haspopup="false"><a href="#">Contact</a> </li>

                <li role="menuitem" aria-label="Menu index" aria-haspopup="false" class="drap">
                    <!-- Logo du panier -->
                <form class="d-flex">
                            <button class="btn btn-outline-dark" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Cart
                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </button>
                        </form>

                </li>



        </ul>
    

    </nav>
</header>

        <!--Content-->
        @yield('content')


        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Léonardo Inovation inc. 2024</p></div>
            <div class="reseau-sociaux">
          
                    <span><i class="fa-brands fa-instagram fa-2xl"></i></span>
                    <span><i class="fa-brands fa-x-twitter fa-2xl"></i></span>

            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>

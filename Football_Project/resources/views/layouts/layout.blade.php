<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <title>
            @yield('titrePage')
        </title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                    <a class="navbar-brand">
                        <img src="../public/images/logoFS.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                        FOOT SKILLS
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/pay') }}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.lequipe.fr/">Actualités</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.youtube.com/channel/UCprrnhl1JdR9F-Yfr5Hek9Q">Vidéos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catégories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ url('/clubs') }}">TEAMS</a></li>
                                <li><a class="dropdown-item" href="{{ url('/joueurs') }}">PLAYERS</a></li>
                                <li><a class="dropdown-item" href="{{ url('/championnats') }}">CHAMPIONNATS</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
        <header>
            @yield('titreItem')
        </header>
        @yield('contenu')
        <footer class="footer">
            Projet-ISI2 - copyright METZGER/DUMAS - 2021
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>

</html>
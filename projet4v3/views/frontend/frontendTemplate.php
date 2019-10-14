<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Billet Simple pour l'Alaska</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/public/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Icon fonts-->
    <link rel="stylesheet" href="/public/css/pe-icon-7-stroke.css">
    <!-- Lightbox CSS-->
    <link rel="stylesheet" href="/public/vendor/lightbox2/css/lightbox.min.css">
    <!-- Leaflet CSS-->
    <link rel="stylesheet" href="/public/vendor/leaflet/leaflet.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/public/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/public/css/custom.css">
    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="/public/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/public/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/public/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/public/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/public/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/public/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/public/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/public/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/public/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/public/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/public/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Tweaks for older IEs  -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <!-- navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg py-lg-0">
            <div class="container">
                <a href="index.php?action=home" class="navbar-brand text-uppercase font-weight-bold">Billet Simple pour l'Alaska</a>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right small"><span class="text-uppercase mr-2">Menu</span><i class="fas fa-bars"></i></button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto d-lg-flex align-items-lg-center">
                        <li class="nav-item"><a href="index.php?action=home" class="nav-link font-weight-bold text-uppercase px-lg-3 py-lg-4 active">Accueil </a>
                        </li>
                        <li class="nav-item"><a href="index.php?action=listArticles" class="nav-link font-weight-bold text-uppercase px-lg-3 py-lg-4">Chapitres </a>
                        </li>



                        <li class="nav-item mt-4 mt-lg-0">
                            <?php if (empty($_SESSION['username'])) { ?>
                                <button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-outline-primary nav-btn btn-sm"> <i class="fas fa-sign-out-alt mr-2"></i>Me connecter </button> <?php
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    if (!empty($_SESSION['id'])) { ?><a href="index.php?action=disconnect" class="btn btn-outline-primary nav-btn btn-sm"> <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 id="loginModalLabel" class="text-uppercase modal-title m-0">Connexion</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="small text-muted">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?action=userConnect" method="post">

                        <div class="form-group">
                            <input type="email" placeholder="email" name="pseudoconnect" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="password" name="passconnect" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="formconnection" class="btn btn-outline-primary nav-btn btn-sm"> <i class="fas fa-sign-out-alt mr-2"></i>Connexion </button>
                        </div>

                    </form>
                    <div class="text-center">
                        <p class="text-muted small">Pas encore de compte ?</p>
                        <p class="small text-muted"> <a href="index.php?action=register" class="font-weight-bold">Créez un compte maintenant</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section style="background: url(/public/img/jumbotron1.jpg)" class="py-5 bg-cover bg-center">
        <div class="hero-overlay"></div>
        <div class="container py-5 text-white text-center">
            <h1 class="text-shadow hero-heading">Billet Simple pour l'Alaska</h1>
            <p class="text-shadow lead my-4">Jean Forteroche </p>
        </div>
    </section>
    <section> <?= $content ?>
    </section>
    <footer style="background: #eee;" class="pt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8 col-md-6 mb-4">
                    <h5 class="lined lined-dark mb-3">A propos de l'auteur</h5>
                    <p class="text-muted text-small">Jean Forteroche est né en 1986 à New-York. Issu d'un milieu artistique, il se penche rapidement vers l'écriture et publie son premier roman, "Itinéraire d'un enfant riche" à l'âge de 20 ans. </p>
                    <p class="text-muted text-small">Fort de son premier succès, il a depuis publié 8 autres romans qui ont tous reçu un accueil mitigé </p>
                </div>


                <div class="col-lg-4 col-md-6">

                </div>
            </div>
        </div>
        <div class="bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-left mb-1 mb-lg-0">
                        <p class="small text-gray mb-0">©2019 JMRAFF</p>
                    </div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <p class="small text-gray mb-0">Billet Simple pour l'Alaska</p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- JavaScript files-->
    <script src="/public/vendor/jquery/jquery.min.js"></script>
    <script src="/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/public/vendor/lightbox2/js/lightbox.min.js"></script>
    <script src="/public/vendor/leaflet/leaflet.js"></script>
    <script src="/public/js/front.js"></script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>
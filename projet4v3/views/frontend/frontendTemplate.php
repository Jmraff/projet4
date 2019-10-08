<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Multi - Multipurpose Bootstrap theme by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/projet4v3/public/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Icon fonts-->
    <link rel="stylesheet" href="/projet4v3/public/css/pe-icon-7-stroke.css">
    <!-- Lightbox CSS-->
    <link rel="stylesheet" href="/projet4v3/public/vendor/lightbox2/css/lightbox.min.css">
    <!-- Leaflet CSS-->
    <link rel="stylesheet" href="/projet4v3/public/vendor/leaflet/leaflet.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/projet4v3/public/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/projet4v3/public/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/projet4v3/public/img/favicon.png">
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
                <p class="navbar-brand text-uppercase font-weight-bold">Billet Simple pour l'Alaska</p>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right small"><span class="text-uppercase mr-2">Menu</span><i class="fas fa-bars"></i></button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto d-lg-flex align-items-lg-center">
                        <li class="nav-item"><a href="index.php?action=home" class="nav-link font-weight-bold text-uppercase px-lg-3 py-lg-4 active">Accueil </a>
                        </li>
                        <li class="nav-item"><a href="index.php?action=listArticles" class="nav-link font-weight-bold text-uppercase px-lg-3 py-lg-4">Chapitres </a>
                        </li>


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
    <div id="loginModal" tabindex="-1" role="dialog" aria-lebelledby="loginModalLabel" aria-hidden="true" class="modal fade">
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
    <section style="background: url(/projet4v3/public/img/jumbotron1.jpg)" class="py-5 bg-cover bg-center">
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
                    <p class="text-muted text-small">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus magna. Cras in mi at felis aliquet congue. Vivamus magna. Cras in mi at felis aliquet congue.</p>
                    <p class="text-muted text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.</p>
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
                        <p class="small text-gray mb-0" class="text-gray">Billet Simple pour l'Alaska</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- JavaScript files-->
    <script src="/projet4v3/public/vendor/jquery/jquery.min.js"></script>
    <script src="/projet4v3/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/projet4v3/public/vendor/lightbox2/js/lightbox.min.js"></script>
    <script src="/projet4v3/public/vendor/leaflet/leaflet.js"></script>
    <script src="/projet4v3/public/js/front.js"></script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>
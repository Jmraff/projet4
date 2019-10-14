<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

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
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({

            selector: '#article_content'
        });
    </script>




</head>

<body>
    <!-- navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg py-lg-0">
            <div class="container"><a href="index.php?action=adminHome" class="navbar-brand text-uppercase font-weight-bold">Accueil</a>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right small"><span class="text-uppercase mr-2">Menu</span><i class="fas fa-bars"></i></button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto d-lg-flex align-items-lg-center">
                        <li class="nav-item"><a href="index.php?action=newChapter" class="nav-link font-weight-bold text-uppercase px-lg-3 py-lg-4 active">Ajout d'un chapitre </a>
                        </li>
                        <li class="nav-item"><a href="index.php?action=manageComments" class="nav-link font-weight-bold text-uppercase px-lg-3 py-lg-4">Gestion des commentaires </a>
                        </li>

                        <li class="nav-item mt-4 mt-lg-0"><a href="index.php?action=disconnect" class="btn btn-outline-primary nav-btn btn-sm"> <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section style="background: url(/public/img/jumbotron1.jpg)" class="py-5 bg-cover bg-center">
        <div class="hero-overlay"></div>
        <div class="container py-5 text-white text-center">
            <h1 class="text-shadow hero-heading">Billet Simple pour l'Alaska</h1>
            <p class="text-shadow lead my-4">Jean Forteroche </p>
        </div>
    </section>
    <section> <?= $content ?> </section>
    <footer style="background: #eee;" class="pt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8 col-md-6 mb-4">
                    <h5 class="lined lined-dark mb-3">Page Administrateur</h5>

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
<?php ob_start(); ?>
<section class="py-5">
    <div class="container py-5">
        <h2 class="mb-4">Invitation à la lecture </h2>
        <p class="lead">À l'occasion de la sortie de mon dixième roman, j'ai décidé de le rendre accessible à tous en le diffusant gratuitement en ligne. Il sera diffusé, à l'image d'une série, par épisodes à raison d'un chapitre par mois.</p>
        <p class="text-small">Cette démarche me permettra d'améliorer le roman en fonction de vos retours. Je vous invite donc à créer un compte afin de me laisser vos impressions sur chaque chapitre. </p>
    </div>
</section>





<?php $content = ob_get_clean(); ?>

<?php require('frontendTemplate.php'); ?>
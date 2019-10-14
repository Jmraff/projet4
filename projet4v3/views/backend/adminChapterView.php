<?php ob_start(); ?>


<section class="py-5 bg-cover bg-gray">
    <div class="container py-5">
        <div aria-label="breadcrumb" class="nav">
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="./"></a></li> -->
                <li aria-current="page" class="breadcrumb-item active"><?= $article1['creationDate'] ?></li>
            </ol>
        </div>
        <h1 class="lined"><?= $article1['title'] ?></h1>
        <p class="lead my-4"> <?= $article1['content'] ?></p>
    </div>

</section>




<section>

    <h5 class="mb-4">Commentaires</h5>
    <div class="container py-5">
        <?php while ($c = $comments->fetch()) { ?>

            <div class="media mb-5">


                <div>
                    <h6 class="my-2"><?= $c['username'] ?></h6>
                    <p class="small text-muted"> <i class="far fa-clock mr-1"></i><?= $c['dateCreation'] ?></p>


                    <?= $c['comment'] ?><br />


                <?php
                } ?>

                </div>
            </div>




            <h5 class="mb-4">Laisser un commentaire</h5>

            <?php if (empty($_SESSION['username'])) { ?><p>Vous devez être connecté pour poster un commentaire<?php }
                                                                                                                if (!empty($_SESSION['id'])) { ?>
                    <form id="contact-form" method="post" action="index.php?action=addComment&postId=<?= $article1['postId'] ?>" class="contact-form form">

                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label for="message" class="font-weight-normal">Commentaire <span class="text-primary">*</span></label>
                                <textarea id="message" rows="3" name="comment" placeholder="Votre commentaire..." class="form-control"></textarea>
                            </div>
                            <div class="form-group col-lg-12 text-right">
                                <button type="submit" value="Poster mon commentaire" name="submit_comment" class="btn btn-outline-primary"> <i class="far fa-comment mr-2"> </i>Poster mon commentaire</button>
                            </div>
                        </div><?php } ?>

                    </form>
    </div>
</section>










<?php if (isset($c_msg)) {
    echo $c_msg;
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('backendTemplate.php'); ?>
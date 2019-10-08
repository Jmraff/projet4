<?php ob_start(); ?>
<h1>liste</h1>



<?php
while ($data = $list->fetch()) {

    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['mail']) ?>


        </h3>
    </div>
<?php
}
$list->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require('backendTemplate.php'); ?>
<h2><?= $velo->getName() ?></h2>

<h2>Caractéristiques :</h2>
  <p><?= $velo->getDescription() ?><p>

<img src="images/<?= $velo->getImage() ?>" style="max-width:200px" alt="">
<br>

<form action="?type=velo&action=delete" method="post">
    <button class="btn btn-danger" type="submit" name="id" value="<?= $velo->getId() ?>">Supprimer</button>
</form>


<form class="ms-5" action="?type=avis&action=new" method="post">
    <div class="form-group"><input placeholder="Votre nom"  type="text" name="author" id=""></div>
    <div class="form-group"><textarea placeholder="Votre avis" type="text" name="content" id=""></textarea></div>
    <div class="form-group"><button name='veloId' value="<?= $velo->getId()?>" class="btn btn-success">Poster</button></div>
</form>



<?php foreach($avis as $avi) : ?>
            <div class="row bg-success mt-2 mb-2">

                <h3>
                    <p><strong><?= $avi->getAuthor() ?></strong></p>
                </h3>
                <p class="ms-5" ><?= $avi->getContent() ?></p>

            <form action="?type=avis&action=delete" method="post">
                <button type="submit" class="btn btn-danger" name="id" value="<?= $avi->getId()?>">Supprimer</button>
            </form>
            </div>
<?php endforeach ?>

<?php if(!$avis){?>
   <h2>Soyez le premier à donner votre avis sur le <?= $velo->getName() ?>  !!</h2>
<?php } ?>
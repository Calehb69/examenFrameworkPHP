<h1>Bienvenue à la boutique du vélo</h1>

<?php foreach($velos as $velo){ ?>


<div class="row mt-3 mb-3 bg-warning justify-content-center">

  <h2><?= $velo->getName() ?></h2>
  <img src="images/<?= $velo->getImage() ?>" style="max-width:200px" alt="">
  <h2>Caractéristiques :</h2>
  <p><?= $velo->getDescription() ?><p>
  <hr>
  <h2>Tarifs :</h2>
  <p><?= $velo->getPrice() ?></p>

  <a href="?type=cocktail&action=show&id=<?= $velo->getId() ?>" class="btn btn-primary">Voir +</a>

</div>

<?php } ?>

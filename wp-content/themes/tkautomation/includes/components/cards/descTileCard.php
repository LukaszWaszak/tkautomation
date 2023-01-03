<?php 

$icon = $args['icon'];
$title = $args['title'];
$desc = $args['desc'];
?>

<div class="descTileCard">
          <div class="descTileCard__icon">
            <img src="<?= $icon['url'] ?>" alt="">
          </div>
          <div class="descTileCard__title">
            <h5><?= $title?></h5>
          </div>
          <div class="descTileCard__desc">
            <p><?= $desc ?></p>
          </div>
        </div>
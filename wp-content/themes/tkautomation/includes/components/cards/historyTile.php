<?php 

$title = $args['title'];
$desc = $args['desc'];
$img = $args['img'];
?>

<div class="historyTileCard">
  <div class="historyTileCard__text">
  <div class="historyTileCard__title">
            <h5><?= $title?></h5>
          </div>
          <div class="historyTileCard__desc">
            <p><?= $desc ?></p>
          </div>
  </div>
  <div class="historyTileCard__line">
      <div class="historyTileCard__line__fill">
        
      </div>
  </div>
  <div class="historyTileCard__img">
    <img src="<?= $img['url'] ?>" alt="">
  </div>

        </div>
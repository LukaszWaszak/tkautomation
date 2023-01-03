<?php 

$img = $args['img'];
$name = $args['name'];
$desc = $args['desc'];
$socialIcon = $args['socialIcon'];
$socialLink = $args['socialLink'];

?>

<div class="PersonTileCard">
  <div class="PersonTileCard__wrapper">
  <div class="PersonTileCard__img">
<img src="<?=$img['url'] ?>" alt="">          
</div>
          <div class="PersonTileCard__about">
            <div class="PersonTileCard__name">
              <h5><?= $name ?></h5>
              <a href="<?= $socialLink['url']?>">
              <img src="<?= $socialIcon['url'] ?>" alt="">
              </a>
            </div>
            <div class="PersonTileCard__desc">
  <p><?= $desc ?></p>
            </div>
          </div>
  </div>
        </div>
<?php
  $url = $args['url'];
  $tag = $args['tag'];
  $tagColor = $args['tagColor'];
  $image = $args['image'];
  $title = $args['title'];
  $level = $args['level'];
  $levelColor = $args['levelColor'];
  $lessonsCount = $args['lessonsCount'];
  $courseType = $args['courseType'];

  $locale = [
    "type" => __('Typ kursu', 'tutlo'),
    "lessons" => __('Liczba lekcji', 'tutlo'),
    "more" => __('Dowiedz się więcej', 'tutlo'),
  ];
?>
<div class="courseCard">
    <?php if (!is_null($tag) && $tag): ?>
    <div
      style="background-color: <?= $tagColor ?>"
      class="courseCard__tag"
    >
      <p><?= $tag->name ?></p>
    </div>
    <?php endif; ?>
    <div class="courseCard__thumbnail">
      <div class="courseCard__thumbnailWrapper">
        <img src="<?= $image ?>" alt="">
      </div>
    </div>
    <div class="courseCard__content">
      <div class="courseCard__title">
        <p class="p p--big"><?= $title ?></p>
      </div>
      <?php if (!is_null($level)): ?>
      <div class="courseCard__level">
        <span style="color: <?= $levelColor ?>"><?= $level->name ?></span>
      </div>
      <?php endif; ?>
      <div class="courseCard__feature">
        <span class="courseCard__featureIcon icon-monitor"></span>
        <p class="courseCard__featureCount p p--small">
          <?= $locale['lessons'] ?>: <?= $lessonsCount ?>
        </p>
      </div>
      <?php if (!is_null($courseType) && $courseType): ?>
      <div class="courseCard__feature">
        <span class="courseCard__featureIcon icon-book-open"></span>
        <p class="courseCard__featureCount p p--small">
          <?= $locale['type'] ?>: <?= $courseType->name ?>
        </p>
      </div>
      <?php endif; ?>
      <div class="courseCard__more">
        <a href="<?= $url ?>" class="button button--default">
          <span class="button__text"><?= $locale['more'] ?></span>
        </a>
      </div>
    </div>
  </div>
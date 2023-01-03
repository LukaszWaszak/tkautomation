<li class="flexibleWidgets__widget">
  <div class="informationWidget informationWidget--<?= $widget['options']['color'] ?>">
    <div class="informationWidget__inner">
      <div class="informationWidget__icon">
        <img class="informationWidget__iconImg" src="<?= THEME_URL . 'public/images/' . $widget['options']['icon'] ?>.svg">
      </div>
      <div class="informationWidget__content">
        <div class="informationWidget__title">
          <h5 class="heading__h5 heading--burgundy">
            <?= $widget['title'] ?>
          </h5>
        </div>
        <div class="informationWidget__content">
          <p class="p">
            <?= $widget['content'] ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</li>

<li class="flexibleWidgets__widget flexibleWidgets__widget--note">
  <div class="noteWidget">
    <div class="noteWidget__inner">
      <div class="noteWidget__title">
        <h5 class="heading__h5 heading--burgundy">
          <?= $widget['title'] ?>
        </h5>
      </div>
      <div class="noteWidget__content">
        <?php foreach ($widget['content'] as $item): ?>
          <p class="noteWidget__contentText">
            <span class="noteWidget__contentHead"><?= $item['head'] ?>: </span>
            <span class="noteWidget__contentBody"><?= $item['body'] ?></span>
          </p>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</li>

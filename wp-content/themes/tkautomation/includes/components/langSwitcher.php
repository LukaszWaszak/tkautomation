<?php
  $langs = [];

  function makeReadable($label) {
    switch ($label) {
      case 'en': return 'English'; break;
      case 'pl': return 'Polski'; break;
      default: break;
    }
  }

  if (function_exists('pll_the_languages')) {
    $langs = pll_the_languages([
      'raw' => 1,
      'echo' => 0,
    ]);
  }

  $current = $langs[pll_current_language()];
  $currentLabel = makeReadable($current['slug']);

?>
<div class="langSwitcher">
  <div class="langSwitcher__currentLang">
    <a
      class="link link--noHover"
      href="<?= $current['url'] ?>"
      tabindex="0"
    >
      <?= $currentLabel ?>
    </a>
  </div>
  <ul class="langSwitcher__langs" tabindex="0">
    <?php foreach ($langs as $lang) : ?>
      <?php if($lang['current_lang'] == false): ?>
        <?php $label = makeReadable($lang['slug']); ?>
        <a
          class="langSwitcher__lang link link--noHover"
          href="<?= $lang['url'] ?>"
          tabindex="0"
          data-lang="<?= $lang['slug'] ?>"
        >
          <?= $label ?>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</div>
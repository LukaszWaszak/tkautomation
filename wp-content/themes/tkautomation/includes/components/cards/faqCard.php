<?php
  $rootClass = '';

  $question = $args['question'];
  $answer = $args['answer'];
  $isTextEditor = $args['isTextEditor'] || false;
  $titleClass = (!is_null($args['titleClass'])) ? $args['titleClass'] : '';
  $theme = (!is_null($args['theme'])) ? $args['theme'] : '';

  $rootClass .= ($theme != '') ? 'faqCard--'.$theme : '';
?>

<div class="faqCard <?= $rootClass ?>" data-faq-card>
  <div class="faqCard__wrapper">
    <div class="faqCard__top">
      <div class="faqCard__question <?= ($titleClass != '') ? 'faqCard__question--'.$titleClass : '' ?>">
        <p class="p p--big"><?= $question ?></p>
      </div>
      <div class="faqCard__toggle">
        <button class="faqCard__toggleButton" data-faq-card-toggle>
          <span class="faqCard__toggleButtonIcon icon-plus" data-faq-card-toggle-icon></span>
        </button>
      </div>
    </div>
    <div class="faqCard__answer">
      <?php if ($isTextEditor): ?>
        <div class="textEditor">
          <?= $answer ?>
        </div>
      <?php else: ?>
        <p class="p"><?= $answer ?></p>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $rootClass = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

  $header = $section['header'];
  $count = $section['count'];
  $questions = $section['questions'];
  $button = $section['button'];
?>

<section class="section faq <?= $rootClass ?>" data-section data-bg-to-footer>
  <div class="container">
    <div class="faq__wrapper">
      <div class="faq__header">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $header,
        'headerTag' => 'h4'
      ]) ?>
      </div>
      <div class="faq__list">
        <?php foreach($questions as $key => $item):
          $details = apply_filters('getFaqQuestionDetails', $item);
        ?>
          <div class="faq__item">
          <?php get_template_part('/includes/components/cards/faqCard', null, [
            'question' => $details['title'],
            'answer' => $details['answer']
          ]); ?>
          </div>
        <?php endforeach ?>
        <div class="faq__more">
        <?php get_template_part('/includes/components/link', null, [
          'url' => (!is_null($button)) ? $button['link']['url'] : '',
          'text' => (!is_null($button)) ? $button['text'] : '',
          'theme' => 'underline',
          'size' => 'big'
        ]) ?>
        </div>
      </div>
    </div>
  </div>
</section>
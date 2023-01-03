<?php
  $newsletter = get_field('newsletter', 'options');
  $form = $newsletter['form'];
  $apiKey = $form['api_key'];
  $beforeHeader = $form['before_header'];
  $beforeText = $form['before_text'];
  $afterHeader = $form['after_header'];
  $afterText = $form['after_text'];
  $submit = $form['submit'];

  $locale = [
    'name' => __('Twoje imię', 'tutlo'),
    'email' => __('Twój adres e-mail', 'tutlo'),
  ]
?>
<section class="section newsletter">
  <div class="container">
    <div class="newsletter__wrapper">
      <div class="newsletter__inner">
        <div class="newsletter__circles newsletter__circles--left"></div>
        <div class="newsletter__circles newsletter__circles--right"></div>
        <div class="newsletter__form" data-vue-component>
          <v-newsletter-form
            before-header='<?= $beforeHeader ?>'
            before-text='<?= $beforeText ?>'
            after-header='<?= $afterHeader ?>'
            after-text='<?= $afterText ?>'
            submit='<?= $submit ?>'
            :locale='<?= json_encode($locale) ?>'
          >
          </v-newsletter-form>
        </div>
      </div>
    </div>
  </div>
</section>
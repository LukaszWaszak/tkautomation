<?php
  $intro = $section['intro'];
  $outro = $section['outro'];
  $steps = $section['steps'];
  $contactForm = $section['contact_form'];
  $locale = [
    'step' => __('Krok', 'tutlo'),
  ];
?>

<section class="section stepFormSection" data-section>
  <div class="container">
    <div class="stepFormSection__wrapper" data-vue-component>
      <div class="stepFormSection__inner">
        <div class="stepFormSection__stepForm">
          <v-step-form
            :intro='<?= json_encode($intro, JSON_HEX_APOS) ?>'
            :outro='<?= json_encode($outro, JSON_HEX_APOS) ?>'
            :steps='<?= json_encode($steps, JSON_HEX_APOS) ?>'
            :locale='<?= json_encode($locale, JSON_HEX_APOS) ?>'
          >

          </v-step-form>
        </div>
        <div class="stepFormSection__contact" data-step-form-contact>
          <?= do_shortcode($contactForm); ?>
        </div>
      </div>
    </div>
  </div>
</section>
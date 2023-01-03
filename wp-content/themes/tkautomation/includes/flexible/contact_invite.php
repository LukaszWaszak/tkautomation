<?php
  $header = $section['header'];
  $text = $section['text'];
  $image = $section['image'];
  $contactFormCode = $section['contact_form'];
  $button = $section['button'];
  $withSocials = $section['social_icons'];
  $showMap = $section['show_map'];
  $map = $section['map'];

  $settings = $section['settings'];
  $headerTag = $settings['header_tag'];
  $headerTag = (!is_null($headerTag)) ? $headerTag : 'h3';

  $contactPhone = get_field('phone', 'options');
  $contactEmail = get_field('email', 'options');

  $socials = get_field('socials', 'options');
  $facebook = $socials['facebook'];
  $youtube = $socials['youtube'];
  $instagram = $socials['instagram'];
  $linkedin = $socials['linkedin'];

  $socialLinks = [
    'facebook' => $facebook,
    'youtube' => $youtube,
    'instagram' => $instagram,
    'linkedin' => $linkedin
  ];
?>

<section class="section contactInvite" id="contact" data-section>
  <div class="container">
    <div class="contactInvite__wrapper">
      <div class="contactInvite__content">
        <div class="contactInvite__head">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $header,
          'text' => $text,
          'headerTag' => $headerTag,
          'isTextBig' => true
        ]) ?>
        </div>
        <div class="contactInvite__contacts">
          <div class="contactInvite__contact">
            <?php get_template_part('/includes/components/link', null, [
              'url' => 'tel: '.$contactPhone,
              'text' => $contactPhone,
              'size' => 'large',
              'iconBefore' => true,
              'icon' => 'phone'
            ]) ?>
          </div>
          <div class="contactInvite__contact">
            <?php get_template_part('/includes/components/link', null, [
              'url' => 'mailto: '.$contactEmail,
              'text' => $contactEmail,
              'size' => 'large',
              'iconBefore' => true,
              'icon' => 'mail'
            ]) ?>
          </div>
        </div>
        <?php if ((is_null($withSocials) || $withSocials == false) && $button['text'] != ''): ?>
        <div class="contactInvite__button">
        <?php get_template_part('/includes/components/button', null, [
          'text' => $button['text'],
          'url' => $button['link']
        ]) ?>
        </div>
        <?php else: ?>
          <div class="contactInvite__socials">
          <?php foreach($socialLinks as $key => $item): ?>
            <div class="contactInvite__social">
            <?php get_template_part('/includes/components/link', null, [
              'icon' => $key,
              'url' => $item,
              'theme' => 'roundPurple',
              'onlyIcon' => true
            ]); ?>
            </div>
          <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="contactInvite__image">
      <?php //if ($showMap == false):
        //get_template_part('/includes/components/image/imageBox', null, [
        //  'image' => $image
      //  ]); elseif($showMap) :
      //  get_template_part('/includes/components/maps/contactMap', null, [
       //   'title' => $map['title'],
       //   'address' => $map['address'],
       ///  'icon' => $map['marker_icon'],
       //   'coordinates' => $map['coordinates'],
     //  ]); else:
         echo do_shortcode($contactFormCode);
     //  endif; ?>
      </div>
    </div>
  </div>
</section>
<?php
  $partners = get_field('footer_partners', 'options');
  $logo = get_field('global_logo', 'options');
  $bottomLinks = get_field('footer_bottom_links', 'options');
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

  $knowledgeMenu = apply_filters('getMenuTree', [], 'knowledge');


  $menus = [$knowledgeMenu] ;
?>
<footer class="footer" data-section>

  <?php
  if (isset($partners) && !is_null($partners) && count($partners) > 0) {
    get_template_part('/includes/sections/partners', null, [
      'list' => $partners
    ]);
  }
  ?>
  <div class="container">
    <div class="footer__top">
      <div class="footer__logo">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => $logo,
        'autoHeight' => true
      ]) ?>
      </div>
      <div class="footer__menus">
      <?php
        foreach($menus as $key => $menu):
          if (isset($menu) && !is_null($menu)):
      ?>
      <div class="footer__menu">
        <ul class="footer__menuItems">
        <?php foreach($menu['items'] as $key => $item): ?>
          <li class="footer__menuItem">
          <?php get_template_part('/includes/components/link', null, [
            'url' => $item['url'],
            'text' => $item['name'],
            'size' => 'big'
          ]) ?>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; endforeach; ?>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="footer__bottomLeft">
        <div class="footer__bottomLeftItem">
          <p class="p">
            &copy; TKAutomation <?= date('Y') ?> <?= __('Wszystkie prawa zastrzeżone', 'TKAutomation') ?>
          </p>
        </div>
     
    </div>
  </div>
</footer>
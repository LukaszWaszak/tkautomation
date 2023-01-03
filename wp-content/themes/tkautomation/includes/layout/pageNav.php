<?php
  $postType = $post->post_type;
  $showProgressBar = in_array($postType, ['post']);

  $pageID = get_the_ID();
  $menuTop = get_field('header_side', 'options');
  // $menuRight = get_field('header_right', 'options');
  // $buttons = get_field('header_buttons', 'options');

  $menuItems = apply_filters('getMenuTree', [], 'header');
  // $kidsMenu = apply_filters('getMenuTree', [], 'kids');
  // $youthMenu = apply_filters('getMenuTree', [], 'youth');
  // $adultsMenu = apply_filters('getMenuTree', [], 'adults');
  // $companiesMenu = apply_filters('getMenuTree', [], 'companies');

  $logo = get_field('global_logo', 'options');
  // $categories = apply_filters('getPageCategories', $pageID);

  // $top = [
  //   $kidsMenu['items'][0], $youthMenu['items'][0], $adultsMenu['items'][0], $companiesMenu['items'][0]
  // ];

  // $menuTree = [
  //   $kidsMenu['items'], $youthMenu['items'], $adultsMenu['items'], $companiesMenu['items']
  // ];

  $activeMenu = $menuItems['items'];

  // if (!is_null($categories)) {
  //   foreach($menuTree as $key => $item) {
  //     foreach($item as $key => $sub) {
  //       $itemID = url_to_postid($sub['url']);
  //       $category = wp_get_post_terms($itemID, 'audience');
  //       $category = array_map(function($item) {
  //         return $item->term_id;
  //       }, $category);

  //       if (!empty($category) && array_intersect($category, $categories)) {
  //         $activeMenu = $sub['children'];
  //         break;
  //       }
  //     }
  //   }
  // }
// ?>

<header class="pageNav" data-page-nav>
  <?php if ($showProgressBar): ?>
    <div class="pageNav__progress" data-page-nav-progress></div>
  <?php endif; ?>
  <div class="pageNav__side" data-page-nav-side>
  </div>
  <div class="container">
    <div class="pageNav__inner">
      <div class="pageNav__top" data-page-nav-top>
        <div class="pageNav__logo">
          <a href="<?= home_url() ?>">
            <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>">
          </a>
        </div>
        <div class="pageNav__navInner">
          <?php foreach($activeMenu as $key => $item):
            $urlID = url_to_postid($item['url']);
          ?>
            <div class="pageNav__navItem">
              <a
                href="<?= $item['url'] ?>"
                class="link link--big <?= ($urlID == $pageID) ? 'link--active' : '' ?>"
              >
                <?= $item['name'] ?>
              </a>
            </div>
          <?php endforeach; ?>
          <!-- <div class="pageNav__topLink">
         // <?php// get_template_part('/includes/components/langSwitcher', null, []); ?>
          </div>-->
        </div>
        <div class="pageNav__toggle">
     <?php get_template_part('/includes/components/button', null, [
       'icon' => 'menu',
        'attr' => 'data-page-nav-toggle'
      ]); ?>
        </div> 
      </div>
 
    </div>
    <div class="pageNav__bottom">
        <nav class="pageNav__nav" data-page-nav-main>
          <div class="pageNav__navInner">
          <?php foreach($activeMenu as $key => $item):
            $urlID = url_to_postid($item['url']);
          ?>
            <div class="pageNav__navItem">
              <a
                href="<?= $item['url'] ?>"
                class="link link--big <?= ($urlID == $pageID) ? 'link--active' : '' ?>"
              >
                <?= $item['name'] ?>
              </a>
            </div>
          <?php endforeach; ?>
          </div>
        </nav>
        <div class="pageNav__buttons pageNav__buttons--desktop">
        <?php foreach($buttons as $key => $item):
          $button = $item['button'];
        ?>
          <div class="pageNav__button">
          <?php get_template_part('/includes/components/button', null, [
            'text' => $button['text'],
            'url' => $button['link'],
            'theme' => $key == 0 ? '' : 'transparent',
            'attr' => 'data-page-nav-main-button'
          ]); ?>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</header>
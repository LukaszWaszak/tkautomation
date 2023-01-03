<?php
  $hours     = apply_filters('data_hours_list', []);
  $hoursPage = get_field('header_hours_page', 'option');
  $menu      = apply_filters('wpf_menu', [], 'nav_main');
  $userMenu  = apply_filters('data_header_user_menu', null);
  $langs     = apply_filters('wpf_langs', [], 'title');
?>
<header class="header">
  <div class="header__inner">
    <div class="container">
      <div class="header__top">
        <div class="header__hours">
          <div class="header__hoursLabel"><?= __('Dziś otwarte:', 'lang'); ?></div>
          <a href="<?= get_permalink($hoursPage); ?>" class="header__hoursValue">
            <?= sprintf('%s - %s', $hours['today_start'], $hours['today_end']); ?>
          </a>
        </div>
        <a href="<?= home_url('/'); ?>" class="header__logo">
          <?= is_front_page() ? '<h1>' : '<div>'; ?>
            <img src="<?= get_field('header_logo', 'option'); ?>" class="header__logoImage lazyload"
              alt="<?php bloginfo('name'); ?> - logo">
            <img src="<?= get_field('header_logo_mobile', 'option'); ?>" class="header__logoImage header__logoImage--mobile lazyload"
              alt="<?php bloginfo('name'); ?> - logo">
          <?= is_front_page() ? '</h1>' : '</div>'; ?>
        </a>
        <button class="header__toggle">
          <span class="header__toggleButton">
            <span></span>
          </span>
          <span class="header__toggleLabel"><?= __('Menu', 'lang'); ?></span>
        </button>
        <div class="header__panel">
          <?php if ($langs && $langs['others']) : ?>
            <div class="header__langs">
              <button class="header__langsButton"><?= $langs['current']['slug'] ?? '' ?></button>
              <ul class="header__langsItems">
                <li class="header__langsItem">
                  <a href="<?= $langs['current']['url'] ?? '' ?>"
                    class="header__langsItemLink header__langsItemLink--active">
                    <?= $langs['current']['title'] ?? '' ?>
                  </a>
                </li>
                <?php foreach ($langs['others'] as $item) : ?>
                  <li class="header__langsItem">
                    <a href="<?= $item['url']; ?>" class="header__langsItemLink">
                      <?= $item['title']; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <button class="header__searchToogle button button--small button--gray icon-loupe"></button>

          <?php
            // echo '<pre>';
            //   print_r($userMenu);
            // echo '</pre>';
            // die('died @ C:\home\posnania\cms\wp-content\themes\posnania\includes\layout\header.php:57');

          ?>
          <?php if ($userMenu === null): ?>
            <div class="header__account">
              <a href="#" class="header__loginButton button button--small" data-header="accountButton">
                <span class="button__text"><?= __('Zaloguj', 'lang'); ?></span>
              </a>
              <ul class="header__accountItems" data-header="accountItems">
                <li class="header__accountItem">
                  <a href="//loyalty.posnania.eu"
                    class="header__accountItemLink header__accountItemLink--iconLeft icon-loyalty-badge"
                    target="_blank"
                  >
                    <?= __('Karta stałego klienta', 'lang'); ?>
                  </a>
                </li>
               <li class="header__accountItem">
                  <a href="<?php esc_url(wp_login_url()); ?>"
                    class="header__accountItemLink header__accountItemLink--inactive header__accountItemLink--iconLeft icon-services-laptop">
                    <?php __('Najemcy', 'lang'); ?>
                  </a>
                </li>
              </ul>
            </div>

            <!-- <a href="<?= esc_url(wp_login_url()); ?>" class="header__loginButton button button--disabled button--small">
              <span class="button__text"><?= __('Log in', 'lang'); ?></span>
            </a> -->
          <?php else: ?>
            <div class="header__account">
              <a href="#" class="header__accountButton" data-header="accountButton">
                <div class="header__accountButtonTitle"><?= apply_filters('data_header_user_name', null); ?></div>
              </a>
              <ul class="header__accountItems" data-header="accountItems">
                <?php foreach ($userMenu as $index => $item) : ?>
                  <li class="header__accountItem <?= $item['active'] ? 'header__accountItem--active' : ''; ?>">
                    <a href="<?= $item['url']; ?>" target="<?= $item['target']; ?>"
                      class="header__accountItemLink"><?= $item['title']; ?></a>
                  </li>
                <?php endforeach; ?>
                <li class="header__accountItem">
                  <a href="<?= wp_logout_url(home_url('/')); ?>"
                    class="header__accountItemLink header__accountItemLink--icon icon-logout">
                    <?= __('Wyloguj się', 'lang'); ?>
                  </a>
                </li>
              </ul>
            </div>
          <?php endif; ?>
        </div>
        <div class="header__searchBox">
          <div class="container">
            <form action="<?= home_url('/'); ?>" class="header__searchForm">
              <input type="text" name="s" class="header__searchFormInput" placeholder="<?= __('Wpisz wyszukiwaną frazę...', 'lang'); ?>">
              <button type="button" class="header__searchFormClose"></button>
            </form>
          </div>
        </div>
      </div>
      <div class="header__menu">
        <?php if ($menu) : ?>
          <a href="<?= home_url('/'); ?>" class="header__logo header__logo--small">
            <img src="<?= get_field('header_logo_mobile', 'option'); ?>" class="header__logoImage"
              alt="<?php bloginfo('name'); ?>">
          </a>
          <ul class="header__menuItems">
            <?php foreach ($menu as $item) : ?>
              <li class="header__menuItem <?= $item['active'] ? 'header__menuItem--active' : ''; ?>
                 <?= $item['is_highlighted'] ? 'header__menuItem--highlighted' : ''; ?>">
                <a href="<?= $item['url']; ?>" target="<?= $item['target']; ?>"
                  class="header__menuItemLink"><?= $item['title']; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
      </div>
    </div>
  </div>
</header>
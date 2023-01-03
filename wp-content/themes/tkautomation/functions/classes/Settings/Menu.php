<?php

  namespace ThemeClasses\Settings;

  class Menu
  {
    public function __construct()
    {
      add_action('after_setup_theme', [$this, 'registerNavMenus']);
      add_filter('getMenuTree', [$this, 'getMenuTree'], 10, 2);
      add_filter('getPageCategories', [$this, 'getPageCategories'], 10, 1);
    }

    public function registerNavMenus()
    {
      register_nav_menus([
        'header'      => __('Header Menu', 'tutlo'),
        'kids'        => __('Kids menu', 'tutlo'),
        'youth'       => __('Youth menu', 'tutlo'),
        'adults'      => __('Adults menu', 'tutlo'),
        'companies'   => __('Companies menu', 'tutlo'),
        'footer'      => __('Footer Menu', 'tutlo'),
        'offer'       => __('Our Offer', 'tutlo'),
        'knowledge'   => __('Knowledge Base', 'tutlo'),
        'about'       => __('About Us', 'tutlo')
      ]);
    }

    public function getMenuTree($menu = [], $location)
    {
      global $post;

      $flatMenu = $menu;
      $flatMenu = $this->getMenuItems($menu, $location);

      $treeMenu = [];
      $itemsRefs = [];

      foreach ($flatMenu['items'] as $menuItemObj) {
        $itemId = $menuItemObj->ID;
        $parentId = $menuItemObj->menu_item_parent;

        $itemsRefs[$itemId] = [
          'name'     => $menuItemObj->title,
          'url'      => $menuItemObj->url,
          'target'   => $menuItemObj->target,
          'class'    => $menuItemObj->classes[0],
          'ID'       => $itemId,
          'parentId' => $parentId,
          'children' => [],
          'active'   => (int)$post->ID === (int)$menuItemObj->object_id,
        ];

        if ($parentId == 0) {
          $treeMenu[] = &$itemsRefs[$itemId];
        } elseif (isset($itemsRefs[$parentId])) {
          $itemsRefs[$parentId]['children'][] = &$itemsRefs[$itemId];
        }
      }

      return [
        'name' => $flatMenu['name'],
        'items' => $treeMenu
      ];
    }

    public function getPageCategories($postID) {
      $audience = get_the_terms($postID, 'audience');

      $categories = (is_array($audience)) ? array_map(function($item) {
        return $item->term_id;
      }, $audience) : [];

      return $categories;
    }

    private function getMenuItems($menu, $location)
    {
      // Get all locations
      $locations = get_nav_menu_locations();
      if (empty($locations[$location])) die('no menus defined');

      // Get object id by location
      $menuObject = wp_get_nav_menu_object($locations[$location]);
      $name = wp_get_nav_menu_name($location);

      // Check menu exists
      if (!is_object($menuObject)) return [];

      // Get menu items by menu slug
      $menu = wp_get_nav_menu_items($menuObject->slug);

      // Return menu post objects
      return [
        'name' => $name,
        'items' => $menu
      ];
    }
  }
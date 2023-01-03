<?php
  $initTargetGroup = wp_get_post_terms(get_the_ID(), 'audience', [
    'fields' => 'names'
  ]);

  $hero = get_field('learning_resources_header', $page->ID);
  $filter = get_field('learning_resources_filter', $page->ID);
  $filterOptions = $filter['options'];
  $filterNotFound = $filter['not_found'];

  $search = $filterOptions['search'];
  $topic = $filterOptions['topic'];
  $type = $filterOptions['type'];
  $targetGroup = $filterOptions['target_group'];

  $optionsTopic = [
    'label' => $topic['label'],
    'options' => []
  ];
  $optionsType = [
    'label' => $type['label'],
    'options' => []
  ];
  $optionsTarget = [
    'label' => $targetGroup['label'],
    'options' => []
  ];

  if ($topic['active']) {
    $options = apply_filters('getTermsObjects', 'topic');
    $optionsTopic = [
      'label' => $topic['label'],
      'options' => array_map(function($item) {
        return [
          'value' => $item['term_id'],
          'name' => $item['name']
        ];
      }, $options)
    ];
  }

  if ($type['active']) {
    $options = apply_filters('getTermsObjects', 'resource_type');
    $optionsType = [
      'label' => $type['label'],
      'options' => array_map(function($item) {
        return [
          'value' => $item['term_id'],
          'name' => $item['name']
        ];
      }, $options)
    ];
  }

  if ($targetGroup['active']) {
    $options = apply_filters('getTermsObjects', 'audience');
    $optionsTarget = [
      'label' => $targetGroup['label'],
      'options' => array_map(function($item) {
        return [
          'value' => $item['term_id'],
          'name' => $item['name']
        ];
      }, $options)
    ];
  }

  $apiURL = $baseURL.'/wp-json/api/v1/';
  $locale = [
    'filter' => __('Filtruj', 'tutlo'),
    'card' => [
      'button' => __('Pobierz', 'tutlo'),
    ],
    'sort' => [
      'label' => __('Sortuj', 'tutlo'),
      'chooseLabel' => __('Sortuj po', 'tutlo'),
      'options' => [
        [
          'id' => 'newest',
          'name' => __('Od najnowszych', 'tutlo'),
        ],
        [
          'id' => 'oldest',
          'name' => __('Od najstarszych', 'tutlo'),
        ],
        [
          'id' => 'asc',
          'name' => __('Od A-Z', 'tutlo'),
        ],
        [
          'id' => 'desc',
          'name' => __('Od Z-A', 'tutlo'),
        ],
      ]
    ],
    'pagination' => [
      'all' => __('Wszystkie', 'tutlo'),
      'page' => __('Strona', 'tutlo'),
      'pageOf' => __('z', 'tutlo')
    ]
  ];
?>

<section class="section resourcesFilterSection" data-section>
  <div class="container">
    <div class="resourcesFilterSection__hero">
    <?php get_template_part('/includes/components/text', null, [
      'header' => $hero['header'],
      'headerTag' => 'h4',
      'text' => $hero['text'],
      'isTextBig' => true
    ]) ?>
    </div>
    <div class="resourcesFilterSection__resources" data-vue-component>
      <v-resources
        :api='<?= json_encode($apiURL) ?>'
        :search='<?= json_encode($search) ?>'
        :init-target-group='<?= json_encode($initTargetGroup) ?>'
        :topic-options='<?= json_encode($optionsTopic) ?>'
        :type-options='<?= json_encode($optionsType) ?>'
        :target-options='<?= json_encode($optionsTarget) ?>'
        :not-found='<?= json_encode($filterNotFound) ?>'
        :locale='<?= json_encode($locale) ?>'
      >

      </v-resources>
    </div>
  </div>
</section>
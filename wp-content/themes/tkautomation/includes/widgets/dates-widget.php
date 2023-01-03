<?php

$dates = apply_filters('formatWidgetDates', $widget);

$formattedDates = [];

foreach($dates as $item){
  $formattedDates[$item['month']][] = $item;
}

$headers = [
  $widget['content']['date'],
  $widget['content']['time'],
];

$today = array_filter($dates, function ($date) {
  return $date['date'] == date('Y-m-d');
});


$todayText = $today ? $widget['content']['open'] . ' ' . end($today)['time'] : $widget['content']['close'];

?>

  <li class="flexibleWidgets__widget">
    <div class="datesWidget">
      <div class="datesWidget__inner">
        <div class="datesWidget__icon">
          <img class="datesWidget__iconImg" src="<?= THEME_URL . 'public/images/clock.svg'?>" alt="clock">
        </div>
        <div class="datesWidget__content">
          <div class="datesWidget__title">
            <h5 class="heading__h5 heading--burgundy"><?= $todayText ?></h5>
          </div>
          <div class="datesWidget__popup" data-popup-button>
            <button class="link">
              <?= $widget['content']['button'] ?>
            </button>
            <div class="datesWidget__popupContent" data-popup-content>
              <ul class="tablesList">
                <?php foreach ($formattedDates as $key => $table): ?>
                <li class="tablesList__item">
                  <div class="tablesList__header">
                    <h4 class="heading__h4 heading--burgundy">
                      <?= ucfirst($key) ?>
                    </h4>
                  </div>
                  <table class="table">
                    <thead class="table__head">
                      <tr class="table__headRow">
                        <?php foreach ($headers as $header): ?>
                          <th class="table__header heading__h5 heading--burgundy">
                            <?= $header ?>
                          </th>
                        <?php endforeach; ?>
                      </tr>
                    </thead>
                    <tbody class="table__body">
                      <?php foreach ($table as $item): ?>
                      <tr class="table__bodyRow">
                        <td class="table__data p">
                          <?= date_i18n('d M Y', strtotime($item['date'])) ?>
                        </td>
                        <td class="table__data p">
                          <?= $item['time'] ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </li>
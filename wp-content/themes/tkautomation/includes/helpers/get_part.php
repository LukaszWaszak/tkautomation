<?php
/**
 * Get template part from path
 *
 * @param string $fileName - fileName
 * @param array $varsArray - view variables array
 * @param boolean $render - rendering
 */

$inc = '../includes/';

function get_part($fileName, $varsArray = [], $render = true) {
  $debug = defined('DEBUG_GET_PART') ? DEBUG_GET_PART : false;
  $partTemplatePath = $inc . $fileName . '.php';

  if (!file_exists($partTemplatePath)) {
    error_log(sprintf(
      'Template part file `%s` not exists: %s',
      $partTemplatePath,
      PHP_EOL . __FILE__
    ));

    return;
  }

  ob_start();
  extract($varsArray);
  if ($debug) echo '<!-- begin ' . $fileName . ' -->';
  include($partTemplatePath);
  if ($debug) echo '<!-- end ' . $fileName . ' -->';
  $partHtml = ob_get_clean();

  if ($render == false) return $partHtml;
  echo $partHtml;
}

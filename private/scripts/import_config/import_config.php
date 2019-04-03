<?php

/**
 * Configure modules.
 */

$config_directory = '';

if (defined('PANTHEON_ENVIRONMENT')) {

  switch(PANTHEON_ENVIRONMENT) {
    case 'live':
    case 'test':
    case 'dev':
      $config_directory = dirname(__FILE__) . '/config/' . PANTHEON_ENVIRONMENT;
      break;
    default:
      //This will be multidev instances - use dev settings
      $config_file = dirname(__FILE__) . '/config/multidev/config.inc';
      break;
  }
}

/* Always import all config for now.
 *We can split this out later on
 */
//if (!empty($config_directory)) {
  //passthru("drush cim --partial --source=$config_directory --yes");
    passthru("drush cim  --yes");
//}

// Confirmation for Terminus.
echo('Configuration imported.' . "\n");

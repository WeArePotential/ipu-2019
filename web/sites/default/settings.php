<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 *
 * n.b. The settings.pantheon.php file makes some changes
 *      that affect all envrionments that this site
 *      exists in.  Always include this file, even in
 *      a local development environment, to insure that
 *      the site settings remain consistent.
 */
include __DIR__ . "/settings.pantheon.php";

// Config directory outside of the webroot.
$config_directories = [
    CONFIG_SYNC_DIRECTORY => dirname(DRUPAL_ROOT) . '/config/sync',
];

// Use development config in dev environments.
if ( isset($_ENV['PANTHEON_ENVIRONMENT']) ) {
    switch ($_ENV['PANTHEON_ENVIRONMENT']) {
        case 'live':
        case 'test':
            $config['config_split.config_split.config_dev']['status'] = FALSE;
            break;
        case 'dev':
            $config['config_split.config_split.config_dev']['status'] = TRUE;
    }
} else {
    $config['config_split.config_split.config_dev']['status'] = TRUE;
}

/**
 * If there is a local settings file, then include it
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
  include $local_settings;
}

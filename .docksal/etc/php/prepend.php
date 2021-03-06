<?php

define('PANTHEON_INFRASTRUCTURE_ENVIRONMENT', 'live');
define('PANTHEON_SITE', '85ef1589-b782-4b9f-871e-5e108bb35752');
define('PANTHEON_ENVIRONMENT', 'docksal');
define('PANTHEON_BINDING', '790f7b7693a14dc09ed50ed2850c5ea8');
define('PANTHEON_BINDING_UID_NUMBER', '21182');

define('PANTHEON_DATABASE_HOST', 'db');
define('PANTHEON_DATABASE_PORT', '3306');
define('PANTHEON_DATABASE_USERNAME', 'root');
define('PANTHEON_DATABASE_PASSWORD', 'root');
define('PANTHEON_DATABASE_DATABASE', 'default');
define('PANTHEON_DATABASE_PREFIX', '');
define('PANTHEON_DATABASE_BINDING', '2e2f43ea4d17492db93460e9975bb94a');

define('PANTHEON_REDIS_HOST', '');
define('PANTHEON_REDIS_PORT', '');
define('PANTHEON_REDIS_PASSWORD', '');
define('PANTHEON_VALHALLA_HOST', 'valhalla-11.svc.pantheon.io');
define('PANTHEON_INDEX_HOST', getenv('PANTHEON_INDEX_HOST'));
define('PANTHEON_INDEX_PORT', getenv('PANTHEON_INDEX_PORT'));

$_ENV['PANTHEON_SITE'] = PANTHEON_SITE;
$_ENV['PANTHEON_ENVIRONMENT'] = PANTHEON_ENVIRONMENT;
$_ENV['PANTHEON_BINDING'] = PANTHEON_BINDING;
$_ENV['DRUPAL_HASH_SALT'] = 'b8raPrHQ9nibXYK5G0yNVDXppnTI4fFyWpJX8RcBHQ0';
$_ENV['DB_HOST'] = PANTHEON_DATABASE_HOST;
$_ENV['DB_PORT'] = PANTHEON_DATABASE_PORT;
$_ENV['DB_USER'] = PANTHEON_DATABASE_USERNAME;
$_ENV['DB_PASSWORD'] = PANTHEON_DATABASE_PASSWORD;
$_ENV['DB_NAME'] = PANTHEON_DATABASE_DATABASE;
$_ENV['DB_PREFIX'] = PANTHEON_DATABASE_PREFIX;
$_ENV['CACHE_HOST'] = PANTHEON_REDIS_HOST;
$_ENV['CACHE_PORT'] = PANTHEON_REDIS_PORT;
$_ENV['CACHE_PASSWORD'] = PANTHEON_REDIS_PASSWORD;
$_ENV['PANTHEON_INDEX_PORT'] = PANTHEON_INDEX_PORT;
$_ENV['PANTHEON_INDEX_HOST'] = PANTHEON_INDEX_HOST;

$_ENV['DOCROOT'] = getenv('DOCROOT');
$_ENV['FILEMOUNT'] = getenv('FILEMOUNT');
$_ENV['FRAMEWORK'] = getenv('FRAMEWORK');
$_ENV['AUTH_KEY'] = getenv('AUTH_KEY');
$_ENV['SECURE_AUTH_KEY'] = getenv('SECURE_AUTH_KEY');
$_ENV['LOGGED_IN_KEY'] = getenv('LOGGED_IN_KEY');
$_ENV['AUTH_SALT'] = getenv('AUTH_SALT');
$_ENV['SECURE_AUTH_SALT'] = getenv('SECURE_AUTH_SALT');
$_ENV['LOGGED_IN_SALT'] = getenv('LOGGED_IN_SALT');
$_ENV['NONCE_SALT'] = getenv('NONCE_SALT');

// System paths
putenv('PATH=/usr/local/bin:/bin:/usr/bin:/srv/bin');

$settings = array (
  'conf' => array (
    'pressflow_smart_start' => true,
    'pantheon_binding' => PANTHEON_BINDING,
    'pantheon_site_uuid' => PANTHEON_SITE,
    'pantheon_environment' => 'docksal',
    'pantheon_tier' => 'live',
    'pantheon_index_host' => 'index.live.getpantheon.com',
    'pantheon_index_port' => 449,
    'redis_client_host' => NULL,
    'redis_client_port' => NULL,
    'redis_client_password' => NULL,
    'file_public_path' => 'sites/default/files',
    'file_private_path' => 'sites/default/files/private',
    'file_directory_path' => 'sites/default/files',
    'file_temporary_path' => '/tmp',
    'file_directory_temp' => '/tmp',
    'css_gzip_compression' => false,
    'js_gzip_compression' => false,
    'page_compression' => false,
    'drupal_hash_salt' => 'O4DNvU+71i9hEYkDlTlx03qURPNgUd9G3HSC0AxDE5c=',
    'config_directory_name' => 'config',
    'file_chmod_directory' => 0777,
    'file_chmod_file' => 0666
  ),
  'databases' => array (
    'default' => array (
      'default' => array (
        'host' => PANTHEON_DATABASE_HOST,
        'port' => PANTHEON_DATABASE_PORT,
        'username' => PANTHEON_DATABASE_USERNAME,
        'password' => PANTHEON_DATABASE_PASSWORD,
        'database' => PANTHEON_DATABASE_DATABASE,
        'driver' => 'mysql',
        'prefix' => '',
      ),
    ),
  ),
);

// Legacy Drupal Settings Block
$_SERVER['PRESSFLOW_SETTINGS'] = json_encode($settings);


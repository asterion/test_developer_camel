<?php
session_start();

use App\Camel\Framework;

$dir = dirname(__DIR__);

require $dir . '/vendor/autoload.php';

$config = array_merge(
    parse_ini_file( $dir . '/config/configuration.ini', true ),
    array( 'server' => $_SERVER )
);

if ( ! isset( $_SESSION['user'] ) ) {
    $config['server']['REQUEST_URI'] = '/login';
}

$app = new Framework($config);

$controller = $app->route();

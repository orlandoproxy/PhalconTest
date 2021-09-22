<?php

$loader = new \Phalcon\Loader();
$loader->registerNamespaces(
  [
    'App\Services'    => realpath(__DIR__ . '/../services/'),
    'App\Controllers' => realpath(__DIR__ . '/../controllers/'),
    'App\Models'      => realpath(__DIR__ . '/../models/'),
    'App\Validations' => realpath(__DIR__ . '/../validation/'),
  ]
);

$loader->register();

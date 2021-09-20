<?php

use Phalcon\Mvc\Micro;
use Phalcon\Http\Request;
use Phalcon\Exception;
use Phalcon\Config\ConfigFactory;
use App\Services;
use App\Controllers;
use App\Models;
use App\Config;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/phalcon');

$app = new Micro();
try {
  // Loading Configs
  $config = require(BASE_PATH . '/app/config/config.php');

  // Autoloading classes
  require BASE_PATH . '/app/config/loader.php';

  // Initializing DI container
  /** @var \Phalcon\DI\FactoryDefault $di */
  $di = require BASE_PATH . '/app/config/di.php';

  // Initializing application
  $app = new \Phalcon\Mvc\Micro();

  // Setting DI container
  $app->setDI($di);

  // Setting up routing
  require BASE_PATH . '/app/config/routes.php';

  // Making the correct answer after executing
  $app->after(
    function () use ($app) {
      print_r("after");    
    }
  );

  // Processing request
  $request = new Request();
  $app->handle($request->getURI());
  $app->notFound(function () use ($app) {

      $app->response->setStatusCode(404, "Not Found")->sendHeaders();
      echo 'This is crazy, but this page was not found!';
  });
} catch (\Exception $e) {
  // Returning an error response
  var_dump($e);
  die();
}

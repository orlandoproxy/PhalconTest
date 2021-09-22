<?php
use Phalcon\HttpExceptions;

$usersCollection = new \Phalcon\Mvc\Micro\Collection();
$usersCollection->setHandler('\App\Controllers\UsersController', true);
$usersCollection->setPrefix('/user');
$usersCollection->post('/add', 'addAction');
$usersCollection->get('/list', 'getUserListAction');
$usersCollection->put('/{userId:[1-9][0-9]*}', 'updateUserAction');
$usersCollection->delete('/{userId:[1-9][0-9]*}', 'deleteUserAction');
$app->mount($usersCollection);

// not found URLs
$app->notFound(
  function () use ($app) {
    $exception = $exception = $app->request->getMethod().'-'.$app->request->getURI();
    print_r($exception);
    die();
    
  }
);

<?php

namespace App\Controllers;
use App\Models\Users;

/**
 * Operations with Users: CRUD
 */
class UsersController extends AbstractController
{
    /**
     * Adding user
     */
    public function addAction()
    {

    }

    /**
     * Returns user list
     *
     * @return array
     */
    public function getUserListAction()
    {
       $response = new \Phalcon\Http\Response();
          try {
            $Usuario = Users::find();
            $response->setStatusCode(200, 'OK');
            $response->setContent(json_encode($Usuario));
            $response->send();
          } catch (\Exception $e) {
            $response->setStatusCode(404, 'Not Found');
            $response->setContent($e->getMessage());
            $response->send();
          }
    }
     /**
     * Updating existing user
     *
     * @param string $userId
     */
    public function updateUserAction($userId)
    {

    }

    /**
     * Delete an existing user
     *
     * @param string $userId
     */
    public function deleteUserAction($userId)
    {

    }
}

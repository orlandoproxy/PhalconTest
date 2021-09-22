<?php

namespace App\Controllers;
use App\Models\Users;
use App\Validations\UserValidation;

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
      $validate_user = New UserValidation();
      $message_validate = $validate_user->validate($this->request->getPost());
      $response = new \Phalcon\Http\Response();
      if(count($message_validate)){
        $list_message = array();
        foreach ($message_validate as $message) {
          array_push($list_message,$message->getMessage());
        }
        $response->setStatusCode(402, 'ErrorException');
        $response->setContentType('application/json', 'UTF-8');
        $response->setContent(json_encode($list_message));
        $response->send();
        return $response;
      }
      //añadimos al nuevo Usuario
      try {
        $response_array=[];
        $post_user = $this->request->getPost();
        $usuario = new Users();
        $usuario->first_name = $post_user['first_name'];
        $usuario->last_name = $post_user['last_name'];
        $usuario->pass = $post_user['pass'];
        $usuario->login = $post_user['login'];
        if($usuario->save()){
          $response->setStatusCode(201, '');
          $response_array['Message'] = "the user was successfully stored";
          $response->setContent(json_encode($response_array));
        }else {
          $error_message = $usuario->getMessage();
          $response_array['Message'] = "Error".$error_message;
          $response->setContent(json_encode($response_array));
          $response->setStatusCode(403, 'ErrorException');
        }
        $response->send();
      } catch (\Exception $e) {
        $response->setStatusCode(405, '');
        $response_array['Message'] = "error" . $e->getMessage();
        $response->setContent(json_encode($response_array));
        $response->send();
      }
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

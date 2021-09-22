<?php
namespace App\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;

class UserValidation extends Validation
{
    public function initialize()
    {
      $this->add(
           'first_name',
           new PresenceOf(
               [
                   'message' => 'The first_name is required',
               ]
           )
         );

       $this->add(
            'last_name',
            new PresenceOf(
                [
                    'message' => 'The last_name is required',
                ]
            )
          );

        $this->add(
             'pass',
             new PresenceOf(
                 [
                     'message' => 'The pass is required',
                 ]
             )
           );

         $this->add(
              'login',
              new PresenceOf(
                  [
                      'message' => 'The login is required',
                  ]
              )
            );
    }
}

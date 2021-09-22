<?php

return(
    [
        'database' => [
            //"host"     => "192.168.0.10",
            "host"     => "localhost",
            "username" => "admin",
            "password" => "123456",
            "dbname"   => "PhalconTest",
        ],

        'application' => [
            'controllersDir' => "app/controllers/",
            'modelsDir' => "app/models/",
            'baseUri' => "/",
        ],
    ]
);

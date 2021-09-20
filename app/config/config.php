<?php

return(
    [
        'database' => [
            //"host"     => "192.168.0.10",
            "host"     => "localhost",
            "username" => "admin",
            "password" => "12345",
            "dbname"   => "PhalconTest",
        ],

        'application' => [
            'controllersDir' => "app/controllers/",
            'modelsDir' => "app/models/",
            'baseUri' => "/",
        ],
    ]
);

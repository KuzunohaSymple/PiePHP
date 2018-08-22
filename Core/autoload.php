<?php

spl_autoload_register(function ($classe) {

    $Path_Controller = "Core/";
    $Path_Model = "src/";
    $Path_UserController = "src/Controller/" ;
    $Path_Momodel = "src/Model/";

    $classe = explode("\\", $classe);

    foreach ($classe as $element) {

        $class = $element . '.php';
    }

    if (file_exists($Path_Controller . $class)) {
        require $Path_Controller . $class; 
        // echo "----F----";
    }

    if (file_exists($Path_UserController . $class)) {
        require $Path_UserController . $class;
        // echo "-----R------";
    }

    if (file_exists($Path_Model . $class)) {
        require $Path_Model . $class;
        // echo "-----I-----";
    }

    if (file_exists($Path_Momodel . $class)) {
        require $Path_Momodel . $class;
        // echo "-----I-----";
    }
});
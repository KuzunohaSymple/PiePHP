<?php

spl_autoload_register(function ($classe)
{
    $class = explode('\\', $classe);
    include end($class) . '.php'; // On inclut le dernier élément correspondante au paramètre passé.
});

// spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.


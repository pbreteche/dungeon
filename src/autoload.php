<?php

/**
 * on enregistre une fonction qui sera capable de trouvé la définition de classe
 * à partir de son nom pleinement qualifié
 * 
 * Comme on aura pas besoin de cette fonction nous même par la suite,
 * on la passe sous forme d'une fonction anonyme
 */
spl_autoload_register(function($classname){
    $tmp = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
    $path = __DIR__ . DIRECTORY_SEPARATOR . $tmp . '.php';

    require $path;
});

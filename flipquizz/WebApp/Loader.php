<?php

class Loader
{
    public static function autoload($classname)
    {
        //constante comme une variable la valeur ne se change pas dans le temps

        //$classname = nom de notre fichier

        $path = __DIR__.'/'.$classname.'.php';

        try 
        {
            require_once $path;
        } 
        catch (Exception $e) {
            exit($e->getMessage());
        }
    }
}

//nom de la class :: nom de la function

spl_autoload_register('Loader::autoload');
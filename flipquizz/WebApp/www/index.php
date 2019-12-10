<?php
//php langage interpreter
//require leve une erreure fatale et s'arrete
//include leve une exception et apres continuer le code
//si on savais pas on utilise require once
//../dans le repertoire parent
require_once '../Debug.php';
require_once '../Loader.php';

//rien s'executera apres le exit
//exit;

//.htaccess .htpasswd

//commancer par . = cache
// if(!empty($_GET['url']))
// {
//     echo $_GET['url'];
    
//     //sépare une chaine en plusieurs éléments et les stocke dans un tableau associatif
//     $url = explode('/',$_GET['url']);

//     //var_export($url);
//     //ransamble les valeurs d'un tableau en une chaine de caractères
//     //$str = implode('/', $url);
//     d($url);

// }
// else{
//     echo 'Pas de variable dans l\'url';
// }

$router = new Router();

d($router);
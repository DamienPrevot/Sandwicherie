<?php

$view            = new \stdClass;
$view->file      = '';
$view->haveAsset = true;
$view->vars      = new \stdClass;
$view->errors    = array(); //Possible de faire $view->errors = [];


//--- Déclanchement de la vue ---
/**
 * register_shutdown_function permet de définir une fonction qui sera appelé
 * lorsque le script php sera fini.
 * 
 * Dans le cas présent, le script php est le contrôller qui envoi les variables
 * à la vue, et le système de vue (include des fichiers) est fait par la
 * function définie dans le shutdown_function.
 * 
 * @link http://php.net/manual/fr/function.register-shutdown-function.php
 * 
 * @param callback : Function appelé à la fin du script
 * @param mixed $view : Objet contenant les infos pour la vue
 * 
 * @return void
 */
register_shutdown_function(function($view)
{
    if($view->file === '')
    {
        return;
    }

    $pathViewFile = ROOT_PATH.'/view/'.$view->file;
    if(!file_exists($pathViewFile))
    {
        trigger_error('View file '.$pathViewFile.' not exist', E_USER_WARNING);
        return;
    }

    $headerPathFile = ROOT_PATH.'/view/header.php';
    if($view->haveAsset && file_exists($headerPathFile))
    {
        include($headerPathFile);
    }

    include($pathViewFile);

    $footerPathFile = ROOT_PATH.'/view/footer.php';
    if($view->haveAsset && file_exists($footerPathFile))
    {
        include($footerPathFile);
    }

    return;
}, $view);
//--- Déclanchement de la vue ---

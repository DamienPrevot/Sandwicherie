<?php

//Initialisation du tampon de sortie
ob_start();

//Init session
session_start();
//permet de detruire le cookie de session si le navigateur quitte
session_set_cookie_params(0);

define('ROOT_PATH', realpath(__DIR__.'/..'));

//Inclusion de la config et des fonctions
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/functions/autoload.php');
require_once(__DIR__.'/functions/safe.php');

//Inclusion du système de vue
require_once(__DIR__.'/view.php');

//--- SQL ---
try
{
    $modeles = new \modeles\Modeles($config->db->host, $config->db->user,
                                    $config->db->pwd, $config->db->base);
}
catch(\Exception $e) //Si erreur à la connexion
{
    $view->file = 'error.php';
    
    $view->errors['sql'] = 'Une erreur interne s\'est produite.';
    trigger_error($e->getMessage(), E_USER_WARNING);
    exit;
}
//--- FIN SQL ---
//--- Load modeles ---
$modelesMap = require(__DIR__.'/mapModeles.php');
foreach($modelesMap as $modeleFile)
{
    include(ROOT_PATH.'/modeles/'.$modeleFile);
}
//--- FIN Load modeles ---
//Load bundles
require_once(ROOT_PATH.'/bundles/bundleLoad.php');

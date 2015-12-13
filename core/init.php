<?php

//Initialisation du tampon de sortie
ob_start();

define('ROOT_PATH', realpath(__DIR__.'/..'));

//Inclusion de la config et des fonctions
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/functions/safe.php');

//Inclusion du système de vue
require_once(__DIR__.'/view.php');

//--- SQL ---
try
{
    //Connexion
    $sql = new \PDO(
        'mysql:host='.$config->db->host.';dbname='.$config->db->base,
        $config->db->user,
        $config->db->pwd
    );
    
    //Force l'utf8
    $sql->exec('SET NAMES utf8');
}
catch(\Exception $e) //Si erreur à la connexion
{
    $view->errors['sql'] = 'Une erreur interne s\'est produite.';
    trigger_error($e->getMessage(), E_USER_WARNING);
}
//--- FIN SQL ---


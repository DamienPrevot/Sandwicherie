<?php

//Initialisation du tampon de sortie
ob_start();

//Inclusion de la config et des fonctions
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/functions/safe.php');

//--- SQL ---
$sqlError = false;

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
    $sqlError = true;
    trigger_error($e->getMessage(), E_USER_WARNING);
}
//--- FIN SQL ---

//Var pour la vue
$view = new \stdClass;
$view->sqlError = $sqlError;

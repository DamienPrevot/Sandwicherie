<?php

if(!isset($_SESSION['idClient']))
{
    $_SESSION['idClient'] = 0;
}

define('CLIENT_CONNU', 'known');
define('CLIENT_INCONNU', 'unknown');

$client = array(
    'status' => CLIENT_INCONNU
);

if($_SESSION['idClient'] >= 0)
{
    $idClient = secure($_SESSION['idClient'], 'int');

    $searchClient = \modeles\Users\findClient($idClient);

    if($searchClient !== false)
    {
        $client           = $searchClient;
        $client['status'] = CLIENT_CONNU;
    }
}

$view->vars->client = $client;

<?php

namespace modeles\Commandes;

use \stdClass;

function getInfos()
{
    global $modeles;

    $infos = new stdClass;

    $infos->modeles = &$modeles;
    $infos->name    = 'commandes'; //Table name
    $infos->id      = 'idCommande'; //Primary key

    return $infos;
}
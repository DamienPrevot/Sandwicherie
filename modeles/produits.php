<?php

namespace modeles\Produits;

use \stdClass;

function getInfos()
{
    global $modeles;

    $infos = new stdClass;

    $infos->modeles = &$modeles;
    $infos->name    = 'produits'; //Table name
    $infos->id      = 'idProduit'; //Primary key

    return $infos;
}
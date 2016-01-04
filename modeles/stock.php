<?php

namespace modeles\Stock;

use \stdClass;

function getInfos()
{
    global $modeles;

    $infos = new stdClass;

    $infos->modeles = &$modeles;
    $infos->name    = 'stock'; //Table name
    $infos->id      = 'idProduit'; //Primary key

    return $infos;
}
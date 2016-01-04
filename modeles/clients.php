<?php

namespace modeles\Users;

use \stdClass;

function getInfos()
{
    global $modeles;

    $infos = new stdClass;

    $infos->modeles = &$modeles;
    $infos->name    = 'clients'; //Table name
    $infos->id      = 'idClient'; //Primary key

    return $infos;
}

function getAllClients()
{
    $infos = getInfos();
    $query = 'SELECT '.$infos->id.' FROM '.$infos->name;

    return $infos->modeles->query($query)->fetchAll();
}

function findClient($id)
{
    $infos = getInfos();
    $query = 'SELECT '.$infos->id.' FROM '.$infos->name.' WHERE '.$infos->id.'="'.$id.'"';
    
    return $infos->modeles->query($query)->fetchRow();
}

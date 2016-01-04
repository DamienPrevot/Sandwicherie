<?php

namespace modeles\Slider;

use \stdClass;

function getInfos()
{
    global $modeles;

    $infos = new stdClass;

    $infos->modeles = &$modeles;
    $infos->name    = 'slider'; //Table name
    $infos->id      = 'idSlider'; //Primary key

    return $infos;
}

function getVisuels()
{
    $infos = getInfos();
    $query = 'SELECT title, visuel FROM '.$infos->name.' WHERE status=1 ORDER BY '.$infos->id;
    
    return $infos->modeles->query($query)->fetchAll();
}
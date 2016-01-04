<?php

//Inclusion de l'initialisation du système
require_once(__DIR__.'/core/init.php');

$view->file = 'index.php';



$visuels = \modeles\Slider\getVisuels();

//var_dump($visuels);
$view->vars->visuels = $visuels;
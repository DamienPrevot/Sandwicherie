<?php

$classMap = require(ROOT_PATH.'/core/mapClass.php');

function __autoload($className)
{
    global $classMap;
    
    if(isset($classMap[$className]))
    {
        include($classMap[$className]);
        return true;
    }
}

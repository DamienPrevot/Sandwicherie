<?php

/**
 * Sécurise des datas pour un type donnée
 * 
 * @global PDO $sql : L'objet PDO
 * 
 * @param mixed $data  : La donnée à sécuriser
 * @param string $type : Le type de la donnée attendu
 * 
 * @return mixed : La donnée sécurisé
 */
function secure($data, $type)
{
    //--- Gestion de type de data ---
    $filterType = 'text';

    if($type === 'int' || $type === 'integer')
    {
        $filterType = FILTER_VALIDATE_INT;
    }
    elseif($type === 'float' || $type === 'double')
    {
        $filterType = FILTER_VALIDATE_FLOAT;
    }
    elseif($type === 'bool' || $type === 'boolean')
    {
        $filterType = FILTER_VALIDATE_BOOLEAN;
    }
    elseif($type === 'email')
    {
        $filterType = FILTER_VALIDATE_EMAIL;
    }
    //--- FIN Gestion de type de data ---
    
    //Type autre que texte
    if($filterType !== 'text')
    {
        return filter_var($data, $filterType);
    }

    //Type texte
    
    //Récupère la variable $sql dans le scope de la function
    global $sql;
    
    //Si la connexion sql n'était pas en erreur
    if(is_object($sql))
    {
        //Protection via les fonctions de protection de PDO
        $data = $sql->quote($data);
        $data = substr($data, 1, strlen($data) - 2);
    }
    else
    {
        //Sinon un simple addslashes pour ajouter des slashes avants les quotes
        $data = addslashes($data);
    }

    //Gestion de la version pour le flag d'option d'htmlentities
    $entitiesOpt = ENT_COMPAT;
    if(PHP_VERSION_ID > 50400)
    {
        $entitiesOpt = ENT_COMPAT | ENT_HTML401;
    }

    //Convertit tous les caractères éligibles en entités html
    $data = htmlentities($data, $entitiesOpt);

    return $data;
}

/**
 * Permet de retourner la valeur d'une data existant dans les get
 * 
 * @param string $key : La clé correspondant à la donnée
 * @param string $type : Le type de donnée attendu
 * 
 * @return mixed : La donnée correspondant à la clé
 * 
 * @throws \Exception : Si la clé n'existe pas, une exception est levé
 */
function get($key, $type)
{
    //Si la clé n'existe pas dans $_GET, on lève une exception
    if(!isset($_GET[$key]))
    {
        throw new \Exception('get key '.$key.' not exist.');
    }

    //Si la clé existe, on retourne la data sécurisé
    return secure($_GET[$key], $type);
}

/**
 * Permet de retourner la valeur d'une data existant dans les post
 * 
 * @param string $key : La clé correspondant à la donnée
 * @param string $type : Le type de donnée attendu
 * 
 * @return mixed : La donnée correspondant à la clé
 * 
 * @throws \Exception : Si la clé n'existe pas, une exception est levé
 */
function post($key, $type)
{
    //Si la clé n'existe pas dans $_POST, on lève une exception
    if(!isset($_POST[$key]))
    {
        throw new \Exception('post key '.$key.' not exist.');
    }

    //Si la clé existe, on retourne la data sécurisé
    return secure($_POST[$key], $type);
}

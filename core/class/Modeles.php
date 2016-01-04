<?php

namespace modeles;

use \PDO;
use \Exception;

class Modeles
{
    protected $PDO = null;

    public function __construct($dbHost, $dbLogin, $dbPwd, $dbBase)
    {
        //Connexion
        $this->PDO = new PDO(
                'mysql:host='.$dbHost.';dbname='.$dbBase, $dbLogin, $dbPwd
        );

        //Force l'utf8
        $this->PDO->exec('SET NAMES utf8');
    }

    public function query($query, $prepareArgs = array())
    {
        $statement = $this->PDO->prepare($query);
        $statement->execute($prepareArgs);
        $error     = $statement->errorInfo();
        
        if($error[0] !== null && $error[0] !== '00000')
        {
            throw new Exception($error[2]);
        }
        elseif($statement)
        {
            return new Query($this->pdo, $statement);

            //On vérifie le nombre de résultat. S'il y a des résultat, on retourne la requête
            if($query->nbResult() > 0)
            {
                return $query;
            }
            else
            {
                //Si pas de résultat, on ne note
                return array();
            }
        }

        throw new Exception('SQL unknown error');
    }
}

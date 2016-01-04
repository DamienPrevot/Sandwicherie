<?php

namespace modeles;

use \PDO;

class Query
{
    protected $PDO       = null;
    protected $statement = null;

    public function __construct(&$pdo, $pdoStatement)
    {
        $this->PDO       = $pdo;
        $this->statement = $pdoStatement;
    }

    public function nbResult()
    {
        //Si la requête n'a pas fail, on retourne directement le nombre de ligne
        if($this->statement !== false && is_object($this->statement))
        {
            return $this->statement->rowCount();
        }
        elseif(is_integer($this->statement))
        {
            return $this->statement; //Si pdo->exec()
        }

        return false;
    }

    public function fetchRow()
    {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll()
    {
        $res = array();

        while($fetch = $this->fetchRow())
        {
            $res[] = $fetch;
        }

        return $res;
    }
}

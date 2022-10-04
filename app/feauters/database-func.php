<?php

require_once(dirname(__DIR__) . "/inc/functions.php");


class MyDataBase
{

    public static function MySqlDB(

        $host = "localhost",
        $username = "root",
        $password = "",
        $db = "imonline",
        $port = "3306",
        $charset = 'utf8mb4',
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ]

    ) {

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";

        try {

            $pdo = new \PDO($dsn, $username, $password, $options);

            if ($pdo) {
                return $pdo;
            }
        } catch (\PDOException $e) {

            throw new \PDOException($e->getMessage(), (int)$e->getCode());
            return $e;
        }
    }

    public function MySqlInsert($table, $indexArr, $valuesArr)
    {

        if (
            empty($table) ||
            empty($indexArr) ||
            empty($valuesArr) // ||
        ) {
            return false;
        }

        $insertSql = "INSERT INTO
        `$table` 
        ( " . seprateArray($indexArr , "db") . " ) 
         VALUES
        ( " . seprateArray($valuesArr , "value") . " )   
        ;";

        $dbObj = $this::MySqlDB();
        
        $prepare = $dbObj->prepare($insertSql);

        $execute = ($prepare->errorInfo()) ? $prepare->execute() : null;

        if ($execute) {
            return true;
        } else {
            return false;
        }
    }


    public function MySqlCheck($table, $index, $value)
    {

        if (
            empty($table) ||
            empty($index) //||
        ) {
            return false;
        }

        $dbObj = $this::MySqlDB();
        

        $prepare = $dbObj->prepare("SELECT $index from $table where $index = :value");
        $prepare->bindParam(":value", $value);
        $prepare->execute();

        if($prepare->rowCount() > 0)
        {
            return true;
        } else {
            return false;
        }

    }

    public function MySqlSafeUpdate($table, $index, $newValue , $whereIndex , $whereValue)
    {

        if (
            empty($table) ||
            empty($index) //||
        ) {
            return false;
        }

        $dbObj = $this::MySqlDB();
        

        $exec = $dbObj->exec("UPDATE $table SET $index = '$newValue' WHERE $whereIndex = '$whereValue'");

        if($exec)
        {
            return true;
        } else {
            return false;
        }

    }
}


// WORK FOR FUN AND LOVE NOT FOR MONEY
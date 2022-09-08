<?php 
class MyDataBase {

    public static function MySqlDB(

    $host = "localhost" ,
    $username = "root" ,
    $password = "" ,
    $db = "imonline" ,
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

    public function MySqlInsert($table , $indexArr , $valuesArr)
    {
        $insertSql = "INSERT INTO
        `:table` 
         (`track_id`, `session`, `ip_addr`, `lastupdate`) 
         VALUES (NULL, 'db3938206ddcbc42bbddb3118dd0dd64a6b77773', 'localhost', current_timestamp()); 
        ";
    }
 
}


// WORK FOR FUN AND LOVE NOT FOR MONEY
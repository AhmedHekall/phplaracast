<?php
namespace Core;

use PDO;

class Database
{
       public $connection;
       public $statement;

       public function __construct($config, $username = 'phpmyadmin', $password = 'Ahmed2020@@')
       {

              $dsn = "mysql:" . http_build_query($config, "", ";");

              // $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};port={$config['port']};";


              $this->connection = new Pdo($dsn, $username, $password, [
                     PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC
              ]);
       }
       public function query($sql, $params = [])
       {
              $this->statement = $this->connection->prepare($sql);
              $this->statement->execute($params);
              //return $statement ecexute
              return $this;
       }


       // declare the fetch metod special for class pdo to method special for me  
       public function find()
       {
              return $this->statement->fetch();
       }

       // method used it featch data and condition if is authotgized(تفويض) : the id is not exist in database
       public function findOrFail()
       {
              $result = $this->find();
              if (! $result) {
                     abort();
              }
              return $result;
       }
       public function all()
       {
              return $this->statement->fetchAll();
       }
}

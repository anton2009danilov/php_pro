<?php
namespace App\services;

use App\traits\TSingleton;

class DB implements IDB
{
    use TSingleton;
    
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'store',
        'charset' => 'UTF8',
        'userName' => 'root',
        'password' => '',
    ];
    
    private $connection;
    
    protected function getConnect(): \PDO
    {
        if (empty($this->connection)) {
            $this->connection = new \PDO(
                $this->getDsnString(),
                $this->config['userName'],
                $this->config['password']
                );
            $this->connection->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_ASSOC
                );
        }
        return $this->connection;
    }
    
    private function getDsnString():string {
        return sprintf(
                '%s:host=%s;dbname=%s;charset=%s',
                $this->config['driver'],
                $this->config['host'],
                $this->config['dbname'],
                $this->config['charset']
            );
    }
    
    private function query(string $sql, ?array $params = [])
    {
        $PDOStatement = $this->getConnect()->prepare($sql);
        $PDOStatement->execute($params);
//         var_dump($PDOStatement);
//         exit;
        return $PDOStatement;
    }
    
    public function find(string $sql, ?array $params = [])
    {
//         return $this->query($sql, $params)->fetch();
        return $this->query($sql, $params)->fetch(\PDO::FETCH_OBJ);
    }
    
    public function findAll(string $sql, ?array $params = [])
    {
        return $this->query($sql, $params)->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public function execute(string $sql, ?array $params = []):void
    {
//         var_dump($sql);
//         var_dump($params);
//         exit;
        $this->query($sql, $params);
    }
    
    public function getLastId() {
        return $this->getConnect()->lastInsertId();
    }
}


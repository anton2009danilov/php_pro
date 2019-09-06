<?php
namespace App\services;

use App\traits\TSingleton;

/**
 * Class DB
 * @package App\services
 * 
 * @property GoodRepository good
 * @property UserRepository user
 */
class DB implements IDB
{
    private $config = [];
    private $connection;
    private $repositories = [];
    
    public function __construct(array $config) {
        $this->config = $config;
    }
    
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
        /**
         * 
         * @var \PDOStatement $PDOStatement
         */
        $PDOStatement = $this->getConnect()->prepare($sql);
        $PDOStatement->execute($params);
        return $PDOStatement;
    }
    
    public function queryObject(string $sql, string $class, array $params = [])
    {
        $PDOStatement = $this->query($sql, $params );
        $PDOStatement->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $PDOStatement->fetch();
        
    }
    
    public function queryObjects(string $sql, string $class, array $params = [])
    {
        $PDOStatement = $this->query($sql, $params );
        $PDOStatement->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $PDOStatement->fetchAll();
        
    }
    
    public function find(string $sql, ?array $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }
    
    public function findAll(string $sql, ?array $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }
    
    public function execute(string $sql, ?array $params = []):void
    {
        $this->query($sql, $params);
    }
    
    public function lastInsertId () {
        return $this->getConnect()->lastInsertId();
    }
    
    public function getRepository(string $name) {
        $name = ucfirst($name) . 'Repository';
        $this->$name;
    }
    
    public function __get($name) {
        if(array_key_exists($name, $this->repositories)) {
            return $this->repositories[$name];
        }
        
        $name = ucfirst($name) . 'Repository';
        
        $repositoryName = 'App\\repositories\\' . $name;
        
        if (!class_exists($repositoryName)) {
            return null;
        }
        
        $repository = new $repositoryName($this);
        $this->repositories[$name] = $repository;
        return $repository;
    }
    
}


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Bdd
{
    private $connection;

    public function getConnection()
    {
        return $this->connection;
    }

    public function __construct($envPath)
    {
        require_once $envPath;

        $dsn = 'mysql:host=localhost; dbname=garage; charset=UTF8';

        try {
            $this->connection = new PDO($dsn, 'root', 'root');
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        echo "Connexion BDD OK";
    }
}

<?php

namespace App\DAO\MySQL\gerenciador_de_lojas;


abstract class Conexao
{  
    /**
     * @var \PDO  #Essa primeira parte permite que as clases que herdem possam usar a propriedade do PDO propria do php pra "banco"
     */
    protected $pdo; # "Permite acessa o banco de dados
    public function __construct()
    {
        $host= getenv('GERENCIADOR_MYSQL_HOST');
        $port= getenv('GERENCIADOR_MYSQL_PORT');
        $user= getenv('GERENCIADOR_MYSQL_USER');
        $pass= getenv('GERENCIADOR_MYSQL_PASSWORD');
        $dbname= getenv('GERENCIADOR_MYSQL_DBNAME');

        $dsn ="mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new \PDO($dsn, $user ,$pass);
        #Para mostrar o erro caso exista
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}
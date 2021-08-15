<?php

namespace App\Db;

use \PDO;

class Database {   

    /**
     * Host de conexão com o banco de dados
     *
     * @var string
     */
    private $HOST;

    /**
     * Nome do banco de dados
     *
     * @var string
     */
    private $NAME;

    /**
     * Usuário do banco
     *
     * @var string
     */
    private $USERNAME;

    /**
     * Senha de acesso ao banco de dados
     *
     * @var string
     */
    private $PASSWORD;

    /**
     * Nome da tabela a ser manipulada
     *
     * @var string
     */
    private $table;

    /**
     * Instância de conexão com o banco de dados
     *
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia a conexão
     *
     * @param  string  $table
     *
     */
    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados
     *
     * @return  [type]  [return description]
     */
    private function setConnection() {

    }
}
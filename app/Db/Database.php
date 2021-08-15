<?php

namespace App\Db;

use \PDO;
use \App\Common\Environment;

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
        try {
            $this->setAttributes();

            echo $this->HOST;
            echo $this->NAME;
            echo $this->USERNAME;
            echo $this->PASSWORD;

            $this->connection = new PDO('mysql:host='.$this->HOST.';dbaname='.$this->NAME, $this->USERNAME, $this->PASSWORD);
            
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(Exception $error) {
            echo 'Erro genérico: ' . $error->getMessage();
        } catch(PDOException $error) {
            echo 'Erro no Banco de dados: ' . $error->getMessage();
        }
    }

    private function setAttributes() {
        $this->HOST     = getenv('HOST');
        $this->NAME     = getenv('NAME');
        $this->USERNAME = getenv('USERNAME');
        $this->PASSWORD = getenv('PASSWORD');
    }
}
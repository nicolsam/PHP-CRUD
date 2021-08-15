<?php

namespace App\Db;

use \PDO;
use \PDO\PDOException;

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
     * Método responsável por definir os atributos da classe Dabatase
     */
    private function setAttributes() {
        $this->HOST     = getenv('HOST');
        $this->NAME     = getenv('NAME');
        $this->USERNAME = getenv('USERNAME');
        $this->PASSWORD = getenv('PASSWORD');
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection() {
        try {
            $this->setAttributes();

            $this->connection = new PDO('mysql:host='.$this->HOST.';dbname='.$this->NAME, $this->USERNAME, $this->PASSWORD);
            
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(Exception $error) {
            echo 'Erro genérico: ' . $error->getMessage();
        } catch(PDOException $error) {
            echo 'Erro no Banco de dados: ' . $error->getMessage();
        }
    }

    /**
     * Método responsável por executar queries dentro do Banco de Dados
     *
     * @param   string  $query
     * @param   array $params 
     *
     * @return  PDOStatement
     */
    public function execute($query, $params = []) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;

        } catch(Exception $error) {
            echo 'Erro genérico: ' . $error->getMessage();
        } catch(PDOException $error) {
            echo 'Erro no Banco de dados: ' . $error->getMessage();
        }
    }

    /**
     * Método responsável por inserir dados no Banco de Dados
     *
     * @param   array  $values [ $field => value ]
     *
     * @return  integer ID INSERIDO
     */
    public function insert($values) {
        // Dados da query
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        
        // Montar query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';

        // Executar INSERT
        $this->execute($query, array_values($values));

        // Retorna o ID inserido
        return $this->connection->lastInsertId();
    }
}
<?php

namespace App\Entity;

use \App\Db\Database;

class Vaga {
    /**
     * Indentificador único da vaga
     *
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     *
     * @var string
     */
    public $titulo;

    /**
     * Descrição da vaga
     *
     * @var string 
     */
    public $descricao;

    /**
     * Define se a vaga está ativa ou não
     *
     * @var string(s/n)
     */
    public $status;

    /**
     * Data de publicação da vaga
     *
     * @var string
     */
    public $data;

    /**
     * Método responsável por cadastrar uma vaga no banco de dados
     *
     * @return  boolean
     */
    public function cadastrarVaga() {
        // Definir a data
        $this->data = date('Y-m-d H:i:s');

        // Inserir a vaga no banco de dados
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
                                'titulo'    => $this->titulo,
                                'descricao' => $this->descricao,
                                'status'    => $this->status,
                                'data'      => $this->data,
                            ]);

        echo '<pre>';
        print_r($this);
        echo '</pre>';
        exit;

        // Retonar sucesso caso a operação seja executada com sucesso
    }

}
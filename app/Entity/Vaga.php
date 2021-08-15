<?php

namespace App\Entity;

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

}
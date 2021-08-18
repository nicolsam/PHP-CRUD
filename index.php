<?php

// Mostrar erros
error_reporting(E_ALL);
ini_set('display_errors', '1');

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap/app.php';

use \App\Entity\Vaga;

// Busca
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

// Condições SQL
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%'.$busca.'%"' : null
];

// Cláusula WHERE
$where = implode(' AND ', $condicoes);

// Obtendo Vagas
$vagas = Vaga::getVagas($where);

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';
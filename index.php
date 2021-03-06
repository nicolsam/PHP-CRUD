<?php

// Mostrar erros
error_reporting(E_ALL);
ini_set('display_errors', '1');

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap/app.php';

use \App\Entity\Vaga;
use \App\Db\Pagination;

// Busca
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

// Filtro STATUS
$filtroStatus = filter_input(INPUT_GET, 'filtroStatus', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus, ['sim', 'nao']) ? $filtroStatus : '';

// Condições SQL
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%'.str_replace(' ', '%', $busca).'%"' : null,
    strlen($filtroStatus) ? 'status = "'.$filtroStatus.'"' : null
];

$condicoes = array_filter($condicoes);

// Cláusula WHERE
$where = implode(' AND ', $condicoes);

$quantidadeVagas = Vaga::getQuantidadeVagas($where);

// Paginação
$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1, 10);

// Obtendo Vagas
$vagas = Vaga::getVagas($where, null, $obPagination->getLimit());

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';
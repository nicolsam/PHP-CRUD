<?php

// Mostrar erros
error_reporting(E_ALL);
ini_set('display_errors', '1');

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap/app.php';

define('TITLE', 'Editar vaga');

use \App\Entity\Vaga;

// Validação do ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
    exit;
}

// Consulta a Vaga
$obVaga = Vaga::getVaga($_GET['id']);

// Validação da vaga
if(!$obVaga instanceof Vaga) {
    header('Location: index.php?status=error');
    exit;
}

// Validação do POST
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['status'])) {

    $obVaga->titulo    = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->status    = $_POST['status'];

    $obVaga->atualizar();
    
    header('Location: index.php?status=success');
    exit;
    // echo '<pre>';
    // print_r($obVaga);
    // echo '</pre>'; exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
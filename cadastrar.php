<?php

// Mostrar erros
error_reporting(E_ALL);
ini_set('display_errors', '1');

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap/app.php';

use \App\Entity\Vaga;

if(isset($_POST['titulo'], $_POST['descricao'], $_POST['status'])) {
    $obVaga = new Vaga;

    $obVaga->titulo    = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->status    = $_POST['status'];

    $obVaga->cadastrarVaga();
    
    // echo '<pre>';
    // print_r($obVaga);
    // echo '</pre>'; exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
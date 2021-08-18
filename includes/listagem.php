<?php

    $resultados = '';
    foreach($vagas as $vaga) {
        $resultados .= "<tr>
                            <td class='text-center'>".$vaga->id."</td>
                            <td class='text-center'>".$vaga->titulo."</td>
                            <td id='description' class='text-center'>".$vaga->descricao."</td>
                            <td class='text-center'>".($vaga->status == 'sim' ? 'Ativo' : 'Inativo')."</td>
                            <td class='text-center'>".date('d/m/Y à\s H:i:s', strtotime($vaga->data))."</td>
                            <td class='text-center'>
                                <a href='editar.php?id=".$vaga->id."'><button type='button' class='btn btn-warning'>Editar</button></a>
                                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#excluir-vaga-".$vaga->id."'>Excluir</button>
                                <div class='modal fade text-dark' id='excluir-vaga-".$vaga->id."' tabindex='-1' aria-labelledby='excluirModal' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='excluirModal'>Excluir vaga ".$vaga->titulo."?</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                Deseja realmente excluir a vaga ".$vaga->titulo."?
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Voltar</button>
                                                <a href='excluir.php?id=".$vaga->id."'><button type='button' class='btn btn-danger'>Deletar</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>";
    }

    $resultados = strlen($resultados) ? $resultados : "<tr>
                                                            <td colspan='6' class='text-center'>Nenhuma vaga foi encontrada!</td>
                                                        </tr>";
?>

<main class="p-2">
    <section class="mb-3">
        <a href="cadastrar.php">
            <button class="btn btn-success">Nova vaga</button>
        </a>
    </section>

    <section class="bg-dark rounded">
        <section class="text-light p-2">
            <form method="get">
                <div class="row">
                    <div class="col">
                        <label class="mb-2" for="search-input">Buscar por título</label>
                        <input type="text" name="busca" id="search-input" class="form-control p-2" value="<?=$busca?>">
                    </div>
                    <div class="col d-flex align-items-end">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search" style="font-size: 1.8rem !important;"></i></button>
                    </div>
                </div>
            </form>
        </section>

        <section>

            <table class="table bg-dark text-light mt-3 ">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">TITULO</th>
                        <th class="text-center">DESCRIÇÃO</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">DATA</th>
                        <th class="text-center">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?=$resultados?>
                </tbody>
            </table>
        </section>
    </section>
    
</main>
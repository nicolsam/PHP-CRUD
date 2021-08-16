<?php

    $resultados = '';
    foreach($vagas as $vaga) {
        $resultados .= "<tr>
                            <td>".$vaga->id."</td>
                            <td>".$vaga->titulo."</td>
                            <td>".$vaga->descricao."</td>
                            <td>".($vaga->status == 'sim' ? 'Ativo' : 'Inativo')."</td>
                            <td>".date('d/m/Y à\s H:i:s', strtotime($vaga->data))."</td>
                            <td>
                                <a href='editar.php?id=".$vaga->id."'><button type='button' class='btn btn-warning'>Editar</button></a>
                                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#excluir-vaga-".$vaga->id."'>Excluir ".$vaga->id."</button>
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
?>

<main class="p-2">
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Nova vaga</button>
        </a>
    </section>

    <section>

        <table class="table bg-dark text-light mt-3 ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>DESCRIÇÃO</th>
                    <th>STATUS</th>
                    <th>DATA</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>
</main>
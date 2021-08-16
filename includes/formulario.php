<main class="p-2">
    <section class="mb-2">
        <a href="index.php">
            <button class="btn btn-success">Home</button>
        </a>
    </section>

    <h2><?=TITLE?></h2>

    <form method="post">
        <div class="form-floating mb-3">
            <input type="text" id="vaga-titulo" class="form-control" name="titulo" placeholder="Título da vaga" value="<?=$obVaga->titulo?>">
            <label for="vaga-titulo">Titulo da vaga</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="descricao" id="vaga-descricao" class="form-control w-100" placeholder="Escreva a descrição da sua vaga" style="resize: none; height: 100px;"><?=$obVaga->descricao?></textarea>
            <label for="descricao">Descrição</label>
        </div>
        <div>
            <div class="form-check form-check-inline mb-3">
                <input type="radio" class="form-check-input" name="status" value="sim" id="vaga-ativa" checked>
                <label class="form-check-label" for="vaga-ativa">Ativo</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="status" value="nao" id="vaga-desativada" <?=$obVaga->status == 'nao' ? 'checked' : '' ?>>
                <label class="form-check-label" for="vaga-desativada">Desativada</label>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-success">Enviar vaga</button>
        </div>
        
    </form>
</main>
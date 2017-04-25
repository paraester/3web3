<!DOCTYPE html>
<html>
<head>
    <title>Eleição Online</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'geral.css' ?>">
</head>
<body>
    <div class="center-block site">
        <h1 class="text-center">Atualização de candidato</h1>
        <nav>
            <a class="btn btn-default" href="<?= URL_RAIZ . 'candidatos' ?>">Voltar</a>
            <a class="btn btn-info" href="<?= URL_RAIZ . 'candidatos/' . $candidato->getId() . '/edit' ?>">Editar</a>
        </nav>
        <form>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input id="nome" name="nome" class="form-control" disabled value="<?= $candidato->getNome() ?>">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input id="descricao" name="descricao" class="form-control" disabled value="<?= $candidato->getDescricao() ?>">
            </div>
            <div class="form-group">
                <label for="idade">Idade</label>
                <input id="idade" name="idade" class="form-control" disabled value="<?= $candidato->getIdade() ?>">
            </div>
            <div class="form-group">
                <label for="partido">Partido</label>
                <input id="partido" name="partido" class="form-control" disabled value="<?= $candidato->getPartido() ?>">
            </div>
        </form>
    </div>
</body>
</html>

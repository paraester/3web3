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
        <h1 class="text-center">Eleição</h1>
        <table class="table table-bordered">
            <thead>
                <tr class="active">
                    <th>Nome</th>
                    <th>Votos</th>
                    <th>Eleitor</th>
                    <th class="coluna-botoes"></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($candidatos)) : ?>
                    <tr>
                        <td colspan="3" class="text-center">Nenhum candidato!</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($candidatos as $candidato) : ?>
                        <tr>
                            <td><?= $candidato->getNome() ?></td>
                            <td><?= $candidato->getVotos() ?></td>
                            <form action="<?= URL_RAIZ . 'votos' ?>" method="POST" class="form-botao">
                            <td><input id="eleitor" name="eleitor" class="form-control"></td>
                            <td>
                                <input type="hidden" name="_metodo" value="PATCH">
                                    <input type="hidden" name="id" value="<?= $candidato->getId() ?>">
                                    <button type="submit" class="btn btn-xs btn-success" title="Votar">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</body>
</html>

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
        <h1 class="text-center">Candidatos</h1>
        <nav>
          <form action="<?= URL_RAIZ . 'login' ?>" method="post">
              <input type="hidden" name="_metodo" value="DELETE">
            <a class="btn btn-primary" href="<?= URL_RAIZ . 'candidatos/create' ?>">Cadastrar candidato</a>
            <a class="btn btn-primary" href="<?= URL_RAIZ . 'votos' ?>">Votos candidato</a>
                <button type="submit" class="btn btn-danger">Sair</button>
            </form>
        </nav>
        <table class="table table-bordered">
            <thead>
                <tr class="active">
                    <th class="coluna-botoes"></th>
                    <th>Nome</th>
                    <th>Descrição</th>
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
                            <td>
                                <a class="btn btn-xs btn-default" href="<?= URL_RAIZ . 'candidatos/' . $candidato->getId() ?>" title="Mostrar">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                <a class="btn btn-xs btn-default" href="<?= URL_RAIZ . 'candidatos/' . $candidato->getId() . '/edit' ?>" title="Editar">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <form action="<?= URL_RAIZ . 'candidatos/' . $candidato->getId() ?>" method="POST" class="form-botao">
                                    <input type="hidden" name="_metodo" value="DELETE">
                                    <button onclick="return confirm('Are you sure? :D')" type="submit" class="btn btn-xs btn-danger" title="Deletar">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>
                            </td>
                            <td><?= $candidato->getNome() ?></td>
                            <td><?= $candidato->getDescricao() ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>

            </tbody>
        </table>
    </div>
</body>
</html>

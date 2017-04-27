<!DOCTYPE html>
<html>
<head>
    <title><?= APLICACAO_NOME ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'geral.css' ?>">
</head>
<body>
    <div class="center-block site">
        <h1 class="text-center">Biblioteca</h1>
        <h2>Cadastro de livro</h2>
        <div class="margin-bottom">
            <form action="<?= /*TODO*/ ?>" method="post" class="form-inline pull-left margin-right">
                <div class="form-group">
                    <input id="titulo" name="titulo" class="form-control campo-grande" autofocus placeholder="Nome">
                </div>
                <button type="submit" class="btn btn-default">Cadastrar</button>
            </form>
            <form action="<?= /*TODO*/ ?>" method="post">
                <input type="hidden" name="_metodo" value="DELETE">
                <button type="submit" class="btn btn-danger">Sair do sistema</button>
            </form>
        </div>
        <h2>Livros</h2>
        <table class="table table-bordered">
            <theader>
                <tr class="active">
                    <th class="col-xs-6">Título</th>
                    <th>Situação</th>
                </tr>
            </theader>
            <tbody>
                <?php if (/*TODO*/) : ?>
                    <tr>
                        <td colspan="2" class="text-center">Nenhum livro cadastrado.</td>
                    </tr>
                <?php endif ?>
                <?php foreach (/*TODO*/) : ?>
                    <tr>
                        <td><?= /*TODO*/ ?></td>
                        <td>
                            <?php if (self::isEmprestadoParaMim($livro)) : ?>
                                <form action="<?= /*TODO*/ ?>" method="post">
                                    <input type="hidden" name="_metodo" value="PATCH">
                                    <button type="submit" class="btn btn-warning">
                                        Devolver
                                    </button>
                                </form>

                            <?php elseif ($livro->isEmprestado()) : ?>
                                    Emprestado para <?= /*TODO*/ ?>

                            <?php else : ?>
                                <form action="<?= /*TODO*/ ?>" method="post">
                                    <input type="hidden" name="_metodo" value="PATCH">
                                    <button type="submit" class="btn btn-primary">
                                        Pegar emprestado
                                    </button>
                                </form>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>

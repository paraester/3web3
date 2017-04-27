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
        <h1 class="text-center">Cadastro de candidato</h1>
        <nav>
          <form action="<?= URL_RAIZ . 'login' ?>" method="post">
              <input type="hidden" name="_metodo" value="DELETE">
              <a class="btn btn-default" href="<?= URL_RAIZ . 'candidatos' ?>">Voltar para a listagem</a>
              <button type="submit" class="btn btn-danger">Sair</button>
          </form>

        </nav>
        <form action="<?= URL_RAIZ . 'candidatos' ?>" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input id="nome" name="nome" class="form-control" autofocus>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input id="descricao" name="descricao" class="form-control">
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input id="foto" name="foto" class="form-control" type="file">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>

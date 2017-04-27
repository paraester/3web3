<!DOCTYPE html>
<html>
<head>
    <title>Eleição Online</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'geral.css' ?>">
    <script type="text/javascript" src="<?= URL_JS. 'votacao.js' ?>"></script>
    <script type="text/javascript" src="<?= URL_JS. 'jquery-3.1.1.min.js'?>"></script>

</head>
<body>
    <div class="center-block site">
        <h1 class="text-center">Eleição</h1>
        <nav>
          <form action="<?= URL_RAIZ . 'login' ?>" method="post">
              <input type="hidden" name="_metodo" value="DELETE">
            <a class="btn btn-primary" href="<?= URL_RAIZ . 'candidatos/create' ?>">Cadastrar candidato</a>
                <button type="submit" class="btn btn-danger">Sair</button>
            </form>
        </nav>

        <table class="table table-bordered">
            <thead>
              <tr class="active">
                  <th>Foto</th>
                  <th>Nome</th>
                  <th>Votos</th>
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
                        <td><img src="<?= URL_IMGCAND . $candidato->getImagem() ?>" alt="Imagem do perfil" class="imagem-usuario pull-left"></td>
                          <td><?= $candidato->getNome() ?></td>
                          <td id="totalVotos<?= $candidato->getId() ?>"><?= $candidato->getVotos() ?></td>
                          <td>
                              <form id="foo" name="foo" action="<?= URL_RAIZ . 'votos' ?>" method="POST" class="form-botao">
                                  <input type="hidden" name="_metodo" value="PATCH">
                                  <input type="hidden" name="id" value="<?= $candidato->getId() ?>">
                                  <button onclick="return eleitorQueVotou(this.id)" id="eleitor<?= $candidato->getId() ?>" name="eleitor" type="button" class="btn btn-xs btn-success" title="Votar" >
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

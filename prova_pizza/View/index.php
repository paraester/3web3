<!DOCTYPE html>
<html>
<head>
    <title>Pizzaria Delivery</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'geral.css' ?>">
</head>
<body>
    <div class="center-block site">
        <h1 class="text-center">Listagem de pedidos</h1>
        <table class="table table-bordered">
            <thead>
                <tr class="active">
                    <th>Nome do cliente</th>
                    <th>Tamanho da pizza</th>
                    <th>Sabor da pizza</th>
                    <th> REMOVER ESTE PEDIDO</th>
                    <th> EDITAR PEDIDO</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pedidos)) : ?>
                    <tr>
                        <td colspan="3" class="text-center">Nenhum pedido!</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($pedidos as $pedido) : ?>
                        <tr>
                            <td id="cliente" value="<?= $pedido->getCliente() ?>"><?= $pedido->getCliente() ?></td>
                            <td id="pizzaTamanho" value="<?= $pedido->getPizzaTamanho() ?>"><?= $pedido->getPizzaTamanho() ?></td>
                            <td id="pizzaSabor" value="<?= $pedido->getPizzaSabor() ?>"><?= $pedido->getPizzaSabor() ?></td>
                            <td>
                                  <form method="POST" action="deletareste">
                                    <input type="hidden" name="remover" value="<?= $pedido->getId() ?>">
                                      <button type="submit" class="btn btn-danger" >Remover Este</button></input>
                                  </form>

                            </td>
                            <td>
                                  <form method="POST" action="updatethisid">
                                    <input type="hidden" name="updatethisid" value="<?= $pedido->getId() ?>">
                                      <button type="submit" class="btn btn-danger" >EDITAR</button>
                                  </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
        <tr>
          <?php if (!empty($pedidos)) : ?>
              <form method="POST" action="pizzaria">
                  <button type="submit" class="btn btn-danger">Remover o primeiro pedido</button>
                  <button type="submit" action="deletar_ultimo" class="btn btn-danger" >Remover o último pedido</button>
              </form>
          <?php endif ?>
</tr>

    </div>
</body>
</html>

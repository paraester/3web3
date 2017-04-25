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
                            <td><?= $pedido->getClienteNome() ?></td>
                            <td><?= $pedido->getPizzaTamanho() ?></td>
                            <td><?= $pedido->getPizzaSabor() ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
        <?php if (!empty($pedidos)) : ?>
            <form method="POST">
                <button type="submit" class="btn btn-danger">Remover o primeiro pedido</button>
            </form>
        <?php endif ?>
<br>
        <?php if (!empty($pedidos)) : ?>
            <form method="POST">
                <button type="submit" class="btn btn-danger">Remover o último pedido</button>
            </form>
        <?php endif ?>

    </div>
</body>
</html>

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
        <h1 class="text-center">Edite seu pedido</h1>
          <form action="updatepedido" method="POST" id="aligned">
          <input type="hidden" name="id" id="id" value="<?= htmlspecialchars($pedido->getId()) ?>">
            <div class="form-group">
                <label for="cliente">Nome do cliente</label>
                <input type="text" name="cliente" id="cliente" value="<?= htmlspecialchars($pedido->getCliente() )?>" autofocus></br>
            </div>
            <div class="form-group">
                <label for="pizza_tamanho">Tamanho da pizza</label>
                <input type="text" name="pizza_tamanho" id="pizza_tamanho" value="<?= htmlspecialchars($pedido->getPizzaTamanho()) ?>"></br>
            </div>
            <div class="form-group">
                <label for="pizza_sabor">Sabor da pizza</label>
                <input type="text" name="pizza_sabor" id="pizza_sabor" value="<?= htmlspecialchars($pedido->getPizzaSabor()) ?>"></br>
            </div>
            <button type="submit" class="btn btn-primary">Finalizar</button>
        </form>
    </div>
</body>
</html>
